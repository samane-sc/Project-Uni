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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/create', 'CreateController@create')->name('create');

Route::post('/allow/{id}', 'AdminController@allow')->name('allow');

Route::post('/deny/{id}', 'AdminController@deny')->name('deny');

Route::post('/done/{id}', 'AdminController@done')->name('done');

Route::post('/alert/{id}', 'AdminController@alert')->name('alert');

Route::get('/link/{id}/{time}', 'AdminController@link');
