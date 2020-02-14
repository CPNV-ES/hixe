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

Route::get('hikes', 'HikeController@listAllHikes');

Route::get('Profile', function () {
    return view('profile');
});

//multi hikes
Route::get('addHikes', function (){
    return view('createHikes');
});
Route::resource('MultiHikes', 'MultiHikesController');

Route::get('/ajouter', function (){
    return view('create_hike');
});
