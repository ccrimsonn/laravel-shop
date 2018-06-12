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

Route::get('/', 'ProductController@getIndex')->name('home');

Route::group(['prefix' => 'signup'], function() {
    Route::get('/', 'CustomerController@index');
    Route::post('register', 'CustomerController@store')->name('register');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
