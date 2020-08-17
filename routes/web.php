<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'RestaurantsController@index');
Route::get('/order', 'OrderController@index')->name('order');
Route::put('/order', 'OrderController@edit')->name('order.edit');

Route::resource('/restaurant', 'RestaurantsController');
Route::resource('/checkout', 'CartController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
