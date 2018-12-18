<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServi within a group which|
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/user/logout','Auth\LoginController@userLogout')->name('user.logout');
Route::post('/admin/logout','Auth\AdminLoginController@logout')->name('admin.logout');

//product routes
Route::resource('product', 'ProductController');

//review routes
Route::get('review/create/{slug}',['as'=>'review.create', 'uses'=>'ReviewController@create'])->where('slug','[\w\d\-\_]+')->middleware('auth');
Route::patch('review/{id}',['as'=>'review.isApproved', 'uses'=>'ReviewController@isApproved']);
Route::resource('review','ReviewController')->except('create');

//subproduct
Route::resource('subproduct','SubproductController');


//subreview routes
Route::get('subreview/create/{slug}',['as'=>'subreview.create', 'uses'=>'SubreviewController@create'])->where('slug','[\w\d\-\_]+')->middleware('auth');
Route::resource('subreview','SubreviewController')->except('create');

//pages routes
Route::get('products/{slug}',['as'=>'pages.single', 'uses'=>'PagesController@getSingle'])->where('slug','[\w\d\-\_]+');
Route::get('accessories/{slug}',['as'=>'accessories.single', 'uses'=>'PagesController@getAccessories'])->where('slug','[\w\d\-\_]+');
Route::get('category/{name}',['as'=>'category.single','uses'=>'PagesController@getCategory']);
Route::get('checkout',['as'=>'pages.checkout','uses'=>'PagesController@checkout'])->middleware('auth');
Route::get('/events',['as'=>'events','uses'=>'PagesController@getEvents']);
Route::get('/','PagesController@index')->name('index');
Route::get('/about','PagesController@about')->name('about');
Route::get('/deals','PagesController@deals')->name('deals');
Route::get('/services','PagesController@services')->name('services');
Route::get('/profile','PagesController@profile')->name('profile')->middleware('auth');

//order
Route::post('/order',['as'=>'order.store','uses'=>'OrderController@store'])->middleware('auth');
Route::post('/order/details',['as'=>'order.details','uses'=>'OrderController@orderDetails'])->middleware('auth');

Route::resource('store', 'StoreController');
Route::resource('category','CategoryController');

//cart routes
Route::get('cart/create/{slug}',['as'=>'cart.create','uses'=>'CartController@create'])->where('slug','[\w\d\-\_]+');
Route::get('cart/create/accessories/{slug}',['as'=>'cart.accessories','uses'=>'CartController@accessories'])->where('slug','[\w\d\-\_]+');
Route::get('cart/increase/{rowId}/{newQty}',['as'=>'cart.increase','uses'=>'CartController@increase']);
Route::get('cart/decrease/{rowId}/{newQty}',['as'=>'cart.decrease','uses'=>'CartController@decrease']);
Route::get('cart/remove/{rowId}',['as'=>'cart.remove','uses'=>'CartController@remove']);
Route::resource('cart','CartController')->except('create');

//admin routes
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
