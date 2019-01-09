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


Route::get('/', 'CarsController@index')->name('home');
Route::get('/home', 'CarsController@index')->name('home');
Route::get('/admin', 'CarsController@sellerview')->name('admin');
Route::get('/create', 'CarsController@create')->name('create');
Route::resource('car', 'CarsController');


Auth::routes();