<?php

namespace App\Http\Controllers;
use App\Http\Requests\UploadRequest;
use App\ProductsMedia;
use App\Cart;
use Illuminate\Http\Request;
use App\Product;
use App\Order;
use Session;
use Auth;

class ProductsController extends Controller {


    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::orderBy('id', 'desc')->get();
        $productsMedia = ProductsMedia::orderBy('id', 'desc')->get();
        return view('products.index', compact('products', 'productsMedia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UploadRequest $request) {

        $this->validate(request(),[
            'name'=> 'required',
            'sku'=> 'required',
            'old_price'=> 'required',
            'new_price'=> 'required',
        ]);

        $product = Product::create([
            'name'=> request('name'),
            'sku'=> request('sku'),
            'old_price'=> request('old_price'),
            'new_price'=> request('new_price'),
        ]);

        foreach ($request->photos as $photo) {
            $filename = $photo->store('public');
            ProductsMedia::create([
                'product_id' => $product->id,
                'gallery' => $filename
            ]);
        }

        return redirect()->action('ProductsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show() {
        return view('products.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $product = Product::find($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        if (isset($_POST['update_product'])){
            $product = Product::find($id);
            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->old_price = $request->old_price;
            $product->new_price = $request->new_price;


            $product->save();

            return redirect()->action('ProductsController@index');
        }else if(isset($_POST['delete_image'])) {
//            echo'<pre>';
//            dd($request);
            unlink(public_path(). '/app/'. $request->delete_image);
            ProductsMedia::destroy($request->id);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = Product::findOrFail($id);
        foreach($product->productsMedia as $image){
            unlink(public_path(). '/app/'.$image->gallery);
            ProductsMedia::destroy($image->id);
        }
        $product->delete();
        Product::destroy($id);
        return redirect()->action('ProductsController@index');
    }

    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->route('shop.shoppingCart');
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }

        return redirect()->route('shop.shoppingCart');
    }

    public function getCart(){
        if (!Session::has('cart')){
            return view('shop.addtocart' );
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('shop.addtocart', ['products'=> $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout(){
        if (!Session::has('cart')){
            return view('shop.addtocart' );
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total'=>$total]);
    }

    public function postCheckout(Request $request){
        if (!Session::has('cart')){
            return view('shop.addtocart' );
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = new Order();
        $order->cart = serialize($cart);
        $order->address = $request->input('address');
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');

        Auth::user()->orders()->save($order) ;


        Session::forget('cart');
        Session::flash('message', "Successfully purchased products!");
        return redirect()->back();
    }
}