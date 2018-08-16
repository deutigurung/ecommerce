<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['as'=>'front.','namespace'=>'Front'], function () {
    Route::get('/','FrontController@getAll')->name('home');
    Route::get('details/{id}','FrontController@showProduct')->name('pro_details');
    Route::get('search','FrontController@searchProduct')->name('search-product');
    Route::get('product/{id}','FrontController@getProductByCategory')->name('product');
});

Route::get('clear-session',function (){
    session()->forget('cart');
    redirect()->back();
});
/** Cart Route**/
Route::group(['as'=>'cart.','namespace'=>'Cart'],function(){
    Route::get('cart-view','CartController@getCart')->name('index');
    Route::post('add-to-cart/{id}','CartController@AddToCart')->name('addCart');
    Route::post('cart-store','CartController@store')->name('store');
    Route::get('cart/{id}','CartController@cartUpdate')->name('cartUpdate');
    Route::delete('cart/{id}','CartController@destroyCart')->name('deleteCart');
    Route::get('clearCart','CartController@clearCart')->name('clearCart');
});
Route::group(['middleware'=>'auth'],function (){
    Route::get('checkout','Cart\CheckoutController@orderPlacemnt')->name('cart.checkout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin',['as'=>'admin.dashboard', 'uses'=>'Admin\DashboardController@getDashboard',['middleware' => 'auth']]);

/* Backend Route */
Route::group(['prefix'=>'admin','as'=>'admin.','namespace'=>'Admin','middleware'=>['auth','isAdmin:admin']],function(){

    Route::get('category/child/{category_id}',['as'=>'category.child','uses'=>'ProductController@getChildCategry']);

    Route::resource('users','UserController');
    Route::resource('banner','BannerController');
    Route::resource('category','CategoryController');
    Route::resource('product','ProductController');

});
/* Users Route
    Route::get('users','UserController@index')->name('users.index');
    Route::get('users/create','UserController@create')->name('users.create');
    Route::post('users','UserController@store')->name('users.store');
    Route::get('users/edit/{id}','UserController@edit')->name('users.edit');
    Route::put('users/update/{id}','UserController@update')->name('users.update');
    Route::delete('users/destroy/{id}','UserController@destroy')->name('users.destroy');

    Banner Route
    Route::get('banners',['as'=>'banner.index','uses'=>'BannerController@index']);
    Route::get('banners/create',['as'=>'banner.create','uses'=>'BannerController@create']);
    Route::post('banners',['as'=>'banner.store','uses'=>'BannerController@store']);
    Route::get('banners/edit/{id}',['as'=>'banner.edit','uses'=>'BannerController@edit']);
    Route::put('banners/update/{id}',['as'=>'banner.update','uses'=>'BannerController@update']);
    Route::delete('banners/destroy/{id}',['as'=>'banner.delete','uses'=>'BannerController@destroy']);

    Category Route
    Route::get('category','CategoryController@index')->name('category.index');
    Route::get('category/create','CategoryController@create')->name('category.create');
    Route::post('category','CategoryController@store')->name('category.store');
    Route::get('category/edit/{id}','CategoryController@edit')->name('category.edit');
    Route::put('category/update/{id}','CategoryController@update')->name('category.update');
    Route::delete('category/delete/{id}','CategoryController@destroy')->name('category.destroy');

    Product Route
    Route::get('product',['as'=>'product.index','uses'=>'ProductController@index']);
    Route::get('product/create',['as'=>'product.create','uses'=>'ProductController@create']);
    Route::post('product',['as'=>'product.store','uses'=>'ProductController@store']);
    Route::get('product/edit/{id}',['as'=>'product.edit','uses'=>'ProductController@edit']);
    Route::put('product/update/{id}',['as'=>'product.update','uses'=>'ProductController@update']);
    Route::delete('product/destroy/{id}',['as'=>'product.delete','uses'=>'ProductController@destroy']);*/