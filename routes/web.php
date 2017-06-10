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


// Routes that can be accessed as a guest without authentication
// Set home page routes
Route::get('/', 'PagesController@getIndex')->name('home');
Route::get('/home', 'PagesController@getIndex')->name('home');
Route::get('/shop', 'PagesController@getShop')->name('shop');
Route::get('/product-page/{product}', 'PagesController@showProduct')->name('product.page');
Route::get('/contact', 'PagesController@getContact')->name('contact');
Route::post('/contact', 'PagesController@postContact');

// Cart controller
Route::resource('/cart', 'CartController', ['except' => ['create', 'show']]);
Route::get('/cart/add-item/{id}', 'CartController@addItem')->name('cart.addItem');

// Laravel generated auth routes
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');


//  Group routes by user that require authentication to access resources
Route::group(['middleware' => ['auth']], function() {

  // User details management
  Route::resource('/address', 'AddressController', ['except' => ['create', 'show']]);
  Route::get('/address-billing/{id}', 'AddressController@toggleBillingAddress')->name('address.toggleBillingAddress');
  Route::get('/address-shipping/{id}', 'AddressController@toggleShippingAddress')->name('address.toggleShippingAddress');
  Route::resource('/cards', 'CardsController');
  Route::get('/cards/toggleDefaultCard/{id}', 'CardsController@toggleDefaultCard')->name('cards.toggleDefaultCard');
  Route::resource('/account-details', 'AccountDetailsController', ['except' => ['create', 'edit', 'show']]);

  // User orders details
  Route::get('/user-orders', 'PagesController@getUserOrders')->name('user.orders');
  Route::get('/user-reviews', 'PagesController@getUserReviews')->name('user.reviews');

  // Reviews
  Route::resource('/reviews', 'ReviewsController');

  // Wishlist
  Route::get('/wishlisht/store', 'WishlishtController@store')->name('wishlisht.store');

  // Checkout routes
  Route::get('/checkout', 'CheckoutController@getIndex')->name('checkout');
  Route::post('complete-order', 'CheckoutController@completeOrder')->name('checkout.completeOrder');
});


// Group routes by admin, user must be authenticated as admin to access routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {

  Route::get('/index', 'PagesController@getDashboard')->name('admin'); // dashboard page
  Route::resource('/products', 'ProductsController');
  Route::resource('/images', 'ProductImagesController');

  Route::get('/messages', 'MessagesController@index')->name('messages.index');
  Route::get('/messages/{message}', 'MessagesController@show')->name('messages.show');
  Route::post('/messages/{message}', 'MessagesController@reply')->name('messages.reply');

  Route::get('/reviews', 'ReviewsController@index');
  Route::get('/reviews/{review}', 'ReviewsController@toggleApproval')->name('reviews.approve');

  Route::resource('/orders', 'OrdersController', ['except' => ['create', 'store']]);
  Route::get('/orders/{order}/show', 'OrdersController@show')->name('orders.show');
  Route::get('/orders/{order}', 'OrdersController@toggleDelivered')->name('orders.deliver');

  Route::get('/users', 'UsersController@index')->name('users.index');
  Route::Delete('/users/{id}', 'UsersController@destroy')->name('users.destroy');

  Route::get('reports', 'PagesController@getReports')->name('reports');

  // Categories
  Route::resource('/categories', 'CategoriesController', ['except' => ['create', 'show']]);
});
