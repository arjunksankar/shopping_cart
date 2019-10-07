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

Route::get('/', 'PageController@index')->name('home');
Route::get('add-item-to-basket/{id}', 'PageController@add_item_to_basket')->name('add_item_to_basket');
Route::get('remove-item-from-basket/{id}', 'PageController@remove_item_from_basket')->name('remove_item_from_basket');

