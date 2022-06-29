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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', 'InitController@index')->name('init');
Route::get('/createProduct', 'CreateProductController@index')->name('createProduct');
Route::post('/createProducts', 'CreateProductController@create')->name('createProducts');
Route::post('/editProducts/{id}', 'InitController@edit')->name('editProducts');
Route::post('/savesEditProducts/{id}', 'InitController@update')->name('saveEditProducts');
Route::post('/removeProducts/{id}', 'InitController@destroy')->name('removeProducts');
Route::post('/sellProduct', 'SellProductController@create')->name('sellProduct');
