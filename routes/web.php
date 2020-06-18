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



Route::get('Profile', function () {
    return view('profile');
});

// Calendar
Route::get('hikes_calendar','HikeCalendarController@index');
Route::get('hikes_calendar/{date}','HikeCalendarController@show');

//multi hikes
Route::resource('multiHikes', 'MultiHikesController');



