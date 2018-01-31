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

//Auth
Route::get("/login", "Auth/LoginController@index");
Route::get("/register", "Auth/RegisterController@index");

//team
Route::get("/team/{id_team}", "TeamController@showTeam");
Route::get("/teams", "TeamController@showAllTeams");

//user
Route::get("/user/{id_user}", "UserController@showUser");

//scrim
Route::get("/scrims/{id_scrim}", "ScrimController@showScrim");
Route::get("/scrims", "ScrimController@showAllScrims");

//Planning
Route::get("/planning/{id_team}", "PlanningController@showPlanning");
Route::get("/planning", "PlanningController@showAllPlannings");
