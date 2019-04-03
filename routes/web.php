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


Route::resource('/','IndexController',['only'=>'index']);

Route::group(['prefix'=>'shop','middleware'=>'auth','web'],function(){
    Route::get('/',['uses'=>'Shop\IndexController@index','as' =>'shopIndex']);
    Route::resource('/shop','Shop\IndexController', [
        'parameters' => ['' => 'shop']]);
});
Route::group(['prefix'=>'cart'],function (){
Route::get('/','Shop\CartController@index');
    Route::resource('/cart','Shop\CartController');
});

Route::get('/checkout','Shop\CheckoutController@index')->name('checkout.index');
Route::post('/checkout','Shop\CheckoutController@store')->name('checkout.store');

Auth::routes();

