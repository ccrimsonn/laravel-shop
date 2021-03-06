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

Route::group(['prefix' => 'products'], function() {
    Route::get('productHome', 'ProductController@getIndex')->name('productHome');
    Route::get('add-to-cart/{id}', 'ProductController@addToCart')->name('addToCart');
    Route::get('reduce/{id}', 'ProductController@reduceByOne')->name('reduceByOne');
    Route::get('remove/{id}', 'ProductController@removeItem')->name('removeItem');
    Route::get('shopping-cart', 'ProductController@showCart')->name('shoppingCart');
});

Route::group(['middleware' => ['customerLogin']], function(){
    Route::get('checkoutPage', 'CheckoutController@checkOutIndex')->name('checkoutPage');
    Route::post('checkout', 'CheckoutController@postCheckOut')->name('checkout');
});

Route::group(['prefix' => 'user'], function() {
    Route::get('signup', 'CustomerController@signUpIndex')->name('signUpPage');
    Route::post('register', 'CustomerController@store')->name('register');
    Route::get('signin', 'CustomerController@signInIndex')->name('signInPage');
    Route::post('login', 'CustomerController@customerLogin')->name('login');
    Route::group(['middleware' => ['customerLogin']], function() {
        Route::get('profile', 'CustomerController@profileIndex')->name('profile');
        Route::get('logout', 'CustomerController@customerLogout')->name('logout');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});