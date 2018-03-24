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


//User

Route::get('/','UsersController@getHome');

Route::get('/login','UsersController@getHome');
Route::post('/login','UsersController@login');

Route::get('/edit','UsersController@getEdit');
