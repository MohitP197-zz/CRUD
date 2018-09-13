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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','CustomerController@index');
Route::get('/home','CustomerController@index')->name('home');
Route::any('/submit', 'CustomerController@submitCustomer')->name('submit');
Route::any('/delete/{customer_id?}', 'CustomerController@deleteCustomer')->name('delete');
Route::any('/edit/{customer_id?}', 'CustomerController@editCustomer')->name('edit');
Route::any('/edit_action/{customer_id?}', 'CustomerController@editAction')->name('edit_action');



