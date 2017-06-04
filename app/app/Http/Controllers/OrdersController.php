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


class OrdersController extends Controller {
    public function index() {
        $orders = Order::orderBy('id', 'desc')->get();
        $orders->transform(function ($orders, $key) {
            $orders->cart = unserialize($orders->cart);

            return $orders;
        });
        $productsMedia = ProductsMedia::orderBy('id', 'desc')->get();
        return view('admin.orders', compact('orders', 'productsMedia'));
    }
}