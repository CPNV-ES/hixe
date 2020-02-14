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
    return view('home');
});

Route::resource('hikes', 'HikeController');

Route::get('Profile', function () {
    return view('profile');
});

<<<<<<< HEAD
Route::get('hikes_calendar','HikeCalendarController@index');
Route::get('hikes_calendar/{date}','HikeCalendarController@show');
=======
//multi hikes
Route::get('addHikes', function (){
    return view('createHikes');
});
Route::resource('MultiHikes', 'MultiHikesController');
>>>>>>> e58fe5dc5758f6a7402cb22827cb122d384c3fea
