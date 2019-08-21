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
Route::get('/',"HomeController@show_home");
Route::get('home',"HomeController@show_home")->name('home');

Route::get('league_table',"HomeController@get_league_table")->name('league_table');
