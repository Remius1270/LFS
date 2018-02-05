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

Route::get('/home', 'HomeController@index');

Route::get('/nik','TeamsController@get_teams');

Route::get('/datepick/{team_id}','TeamsController@datepick');

Route::get('/datepick/{team_id}/{scrim_date}','ScrimsController@askscrim');
