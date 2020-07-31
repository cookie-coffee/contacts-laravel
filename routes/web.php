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
Route::get('/', 'StaticPagesController@home')->name('home');


Route::get('create', 'ContactController@create')->name('create');
Route::get('contacts/fetch_data', 'ContactController@fetch_data');
Route::resource('contacts', 'ContactController');
