<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Role;
use Illuminate\Http\Request;

class UsersController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::orderBy('id', 'desc')->get();

        return view('admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        $user->save();
        $user->role()->attach(Role::where('name', 'User')->first());
        return redirect()->action('UsersController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return view('admin.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $users = User::find($id);

        return view('admin.edit', compact('users'));
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
        $users = User::find($id);
        //        dd (request()->all());
        $users->name = $request->name;
        $users->password = $request->password;
        $users->email = $request->email;
        $users->save();

        return redirect()->action('UsersController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        User::destroy($id);

        return redirect()->action('UsersController@index');
    }

    public function getProfile() {
        $orders = Auth::user()->orders;
        $orders->transform(function ($orders, $key) {
            $orders->cart = unserialize($orders->cart);

            return $orders;
        });

        return view('users.profile', ['orders' => $orders]);
    }

    public function postAdminAssignRoles(Request $request){
        $user = User::where('email', $request['email'])->first();
        $user->role()->detach();
        if($request['role_user']){
            $user->role()->attach(Role::where('name', 'User')->first());
        }
        if($request['role_author']){
            $user->role()->attach(Role::where('name', 'Author')->first());
        }
        if($request['role_admin']){
            $user->role()->attach(Role::where('name', 'Admin')->first());
        }
    }
}
