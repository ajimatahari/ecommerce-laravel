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



// Address controller
Route::resource('/address', 'AddressController', ['except' => ['create', 'show']]);

// Cart controller
Route::resource('/cart', 'CartController', ['except' => ['create', 'show']]);
Route::get('/cart/add-item/{id}', 'CartController@addItem')->name('cart.addItem');

// Set home page routes
Route::get('/', 'PagesController@getIndex')->name('home');
Route::get('/home', 'PagesController@getIndex')->name('home');
Route::get('/contact', 'PagesController@getContact')->name('contact');
Route::post('/contact', 'PagesController@postContact');
Route::get('/shop', 'PagesController@getShop')->name('shop');
Route::get('/basket', 'PagesController@getBasket')->name('basket');
Route::get('/user-orders', 'PagesController@getUserOrders')->name('user.orders');
Route::get('/product-page/{product}', 'PagesController@showProduct')->name('product.page');

Route::get('/user-payment-details', 'PagesController@getPaymentDetails')->name('payment-details');

// Reviews
Route::resource('/reviews', 'ReviewsController');

// Categories view
Route::resource('admin/categories', 'CategoriesController', ['except' => ['create', 'show']]);

// Laravel generated auth routes
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');


// Set admin page route
//Route::get('/admin', 'PagesController@getDashboard')->name('admin');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
  Route::get('/index', 'PagesController@getDashboard')->name('admin');

  // Products routes
  Route::resource('/products', 'ProductsController');
  Route::get('/messages', 'MessagesController@index');
  Route::get('/messages/{message}', 'MessagesController@show');
  Route::get('/reviews', 'ReviewsController@index');
  Route::get('/reviews/{review}', 'ReviewsController@approve')->name('reviews.approve');
  Route::resource('/orders', 'OrdersController', ['except' => ['create', 'store']]);
});


Route::get('admin/users', 'UsersController@index')->name('users');

// Checkout routes
Route::get('/checkout', 'CheckoutController@getIndex')->name('checkout');
Route::post('complete-order', 'CheckoutController@completeOrder')->name('checkout.completeOrder');
