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

Route::get('/', function () {
    return view('menu/home');
});

Route::get('/list-pesanan', 'OrderController@index');


Route::get('/ajukan-pesanan', 'OrderController@ajukanPesanan');
Route::post('/ajukan-pesanan', 'OrderController@postAjukanPesanan');

Route::get('/profile-pemesan', 'OrderController@profilePemesan');
Route::post('/profile-pemesan', 'OrderController@postProfilePemesan');

