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

Route::get('/', 'HikeController@myHike');

// Hikes
Route::resource('hikes', 'HikeController');
Route::get('register_hike/{id}', 'hikeController@registerToHike')->name('hike.registerhike');

Route::resource('profile', 'UserController');

// Calendar
Route::get('hikes_calendar','HikeCalendarController@index');
Route::get('hikes_calendar/{date}','HikeCalendarController@show');

//multi hikes
Route::resource('multiHikes', 'MultiHikesController');

//Authentification
Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/callback', 'Auth\AuthController@handleProviderCallback');
Route::post('auth/logout', 'Auth\AuthController@logoutUser');

