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

Route::get('/','SmartShopController@index')->name('/');

Route::get('/category-product/{id}','SmartShopController@category')->name('category');
Route::get('/product-details/{id}/{name}','SmartShopController@productDetails')->name('product-details');

Route::post('/add-to-cart','CartController@addToCart')->name('add-cart');
Route::get('/cart/show','CartController@showCart');
Route::get('/cart/delete/{id}','CartController@deleteCart')->name('delete-cart-item');
Route::post('/cart/update','CartController@updateCart')->name('update-cart');

Route::get('/checkout','CheckoutController@index')->name('checkout');
Route::post('/checkout/registration','CheckoutController@register')->name('checkout-register');
Route::get('/checkout/shipping','CheckoutController@shipping');
Route::post('/checkout/shipping','CheckoutController@saveShipping')->name('new-shipping');
Route::get('/checkout/payment','CheckoutController@paymentForm');
Route::post('/checkout/order','CheckoutController@newOrder')->name('new-order');
Route::get('/checkout/order/complete','CheckoutController@orderComplete');
Route::post('/checkout/login','CheckoutController@loginCheck')->name('checkout-login');
Route::post('/checkout/logout','CheckoutController@logoutCheck')->name('logout');

Route::get('/stripe', 'StripePaymentController@stripe');
Route::post('/stripe', 'StripePaymentController@stripePost')->name('stripe.post');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Route::get('/category','CategoryController@index')->name('add-category');
Route::post('/category/save','CategoryController@saveCategory')->name('new-category');
Route::get('/category/manage','CategoryController@manageCategory')->name('manage-category');
Route::get('/category/published/{id}','CategoryController@publishedCategory')->name('published-category');
Route::get('/category/unpublished/{id}','CategoryController@unpublishedCategory')->name('unpublished-category');
//Route::get('/category/edit/{id}','CategoryController@editCategory')->name('edit-category');
Route::post('/category/update','CategoryController@updateCategory')->name('update-category');
Route::get('/category/delete/{id}','CategoryController@deleteCategory')->name('delete-category');


Route::get('/brand','BrandController@index')->name('add-brand');
Route::post('/brand/new','BrandController@newBrand')->name('new-brand');
Route::get('/brand/view','BrandController@viewBrand')->name('view-brand');


Route::get('/product','ProductController@index')->name('product');
Route::post('/product','ProductController@saveProduct')->name('new-product');
Route::get('/product/view','ProductController@viewProduct')->name('view-product');

Route::get('/manage-orders','OrderController@manageOrder')->name('order');
Route::get('/view-order-detail/{id}','OrderController@orderDetail')->name('order-detail');
Route::get('/view-order-invoice/{id}','OrderController@viewOrderInvoice')->name('view-order-invoice');
Route::get('/download-order-invoice/{id}','OrderController@downloadInvoice')->name('download-order-invoice');














