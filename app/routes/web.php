<?php



    /* Products */
    Route::get('/', [
        'uses' => 'ProductsController@index',
        'as' => 'products.index',
    ]);
    Route::get('/product/create', 'ProductsController@create');
    Route::post('/product', "ProductsController@store");
    Route::get('/product/{product}', 'ProductsController@destroy');
    Route::get("/product/{product}/edit", "ProductsController@edit");
    Route::put('/product/{product}', 'ProductsController@update');

    /* Admin */
    Route::get('/admin/', [
        'uses' => 'UsersController@index',
        'as' => 'admin.index',
        'middleware' => 'roles',
        'roles' =>['Admin'],
    ]);
    Route::get('/admin/{users}/postAdminAssignRoles', 'UsersController@postAdminAssignRoles' );
    Route::get('/admin/create', 'UsersController@create');
    Route::post('/admin/', 'UsersController@store');
    Route::get('/admin/{users}', 'UsersController@destroy');
    Route::get('/admin/{users}/edit', 'UsersController@edit');
    Route::put('/admin/{users}', 'UsersController@update');
    Route::get('/orders', [
        'uses' => 'OrdersController@index',
        'as' => 'admin.orders'
    ]);
    /* Gallery */
    Route::get('/gallery/', [
        'uses' => 'GalleryController@index',
        'as' => 'gallery.index',
    ]);

// ////////////////////
    /* Shop */
    Route::get('/shop/', [
        'uses' => 'ShopController@index',
        'as' => 'shop.index'
    ]);

    /*   Profile Users*/
    Route::get('/users/profile',[
        'uses' => 'UsersController@getProfile',
        'as' => 'users.profile'
    ]);

    /* Shopping cart */
    Route::get('/add-to-cart/{id}',[
        'uses' => 'ProductsController@getAddToCart',
        'as'=>'shop.AddToCart',
    ]);
    Route::get('/remove/{id}', [
        'uses' => 'ProductsController@getRemoveItem',
        'as' => 'shop.remove'
    ]);
    Route::get('/shopping-cart',[
        'uses' => 'ProductsController@getCart',
        'as'=>'shop.shoppingCart',
    ]);
    Route::get('/reduce/{id}', [
        'uses' => 'ProductsController@getReduceByOne',
            'as' => 'shop.reduceByOne',
    ]);
    Route::get('/checkout', [
        'uses' => 'ProductsController@getCheckout',
        'as' => 'checkout',
    ]);
    Route::post('/checkout', [
        'uses' => 'ProductsController@postCheckout',
        'as' => 'checkout',
    ]);



Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

