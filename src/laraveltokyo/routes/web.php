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


// Route::get('/', function(){
//   return view('default/welcome');
// });
Route::resource('user', 'UserController')->names([
  'index' => 'userIndex',
  // 'user/show/{id}' => 'userShow'
]);

Route::get('user/create', 'UserController@create')->name('userCreate');

Route::post('user/store', 'UserController@store')->name('userStore');

Route::get('user/show/{id}', 'UserController@show')->name('userShow');


Route::get('user/edit/{id}', 'UserController@edit')->name('userEdit');

Route::post('user/update', 'UserController@update')->name('userUpdate');

Route::delete('user/destroy/{id}', 'UserController@destroy')->name('userDestroy');

/** stock route */

Route::get('stock/index', 'StockController@index')->name('stockIndex');

Route::get('stock/create', 'StockController@create')->name('stockCreate');

Route::get('stock/store', 'StockController@store')->name('stockStore');

Route::get('stock/show/{stock_id}', 'StockController@show')->name('stockShow');

Route::get('stock/edit/{id}', 'StockController@edit')->name('stockEdit');

Route::get('stock/update', 'StockController@update')->name('stockUpdate');

Route::delete('stock/destroy/{id}', 'StockController@destroy')->name('stockDestroy');
 


// Auth::routes();


