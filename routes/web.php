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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('ordenes/{user}', 'OrdersController@index');
Route::get('ordenes/{user}/delete/{id}', 'OrdersController@destroy');
Route::get('ordenes/{user}/show/{id}', 'OrdersController@show');
Route::get('ordenes/{user}/seen/{id}', 'OrdersController@seen');
