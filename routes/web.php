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

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home.index');

Route::resource('hikes',HikeController::class)->register();
Route::resource('multiHikes',MultiHikesController::class)->register();
Route::resource('profile',UserController::class)->register();

// Hikes registration
Route::get('register_hike/{id}', 'HikeController@registerToHike')->name('hike.registerhike');
Route::get('unregister_hike/{id}', 'HikeController@unregisterToHike')->name('hike.unregisterhike');

// Calendar
Route::get('hikes_calendar', 'HikeCalendarController@index');
Route::get('hikes_calendar/{date}', 'HikeCalendarController@show');

//Authentification
Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/callback', 'Auth\AuthController@handleProviderCallback');
Route::post('auth/logout', 'Auth\AuthController@logoutUser');

// Autocomplete input
Route::post('hikes/create/fetch', 'HikeController@fetch')->name('autocomplete.fetch');

// Hikes
//Route::resource('hikes', 'HikeController');
Route::post('hikes', 'HikeController@store')->name('hikes.store');
Route::get('hikes', 'HikeController@index')->name('hikes.index');
Route::get('hikes/create', 'HikeController@create')->name('hikes.create');
Route::put('hikes/{hike}', 'HikeController@update')->name('hikes.update');
Route::delete('hikes/{hike}', 'HikeController@destroy')->name('hikes.destroy');
Route::get('hikes/{hike}', 'HikeController@show')->name('hikes.show');
Route::get('hikes/{hike}/edit', 'HikeController@edit')->name('hikes.edit');

// Profile
//Route::resource('profile', 'UserController');
Route::post('profile', 'UserController@store')->name('profile.store');
Route::get('profile', 'UserController@index')->name('profile.index  ');
Route::get('profile/create', 'UserController@create')->name('profile.create');
Route::delete('profile/{profile}', 'UserController@destroy')->name('profile.destroy');
Route::get('profile/{profile}', 'UserController@show')->name('profile.show');
Route::put('profile/{profile}', 'UserController@update')->name('profile.update');
Route::get('profile/{profile}/edit', 'UserController@edit')->name('profile.edit');


Route::middleware(["role:admin,hike_manager"])->group(function () {
    // Import hikes with csv file
    //Route::resource('importHikes', 'ImportHikesController');
    Route::post('import', 'ImportController@store')->name('import.store');
    Route::get('import', 'ImportController@export')->name('import.export');
    Route::get('roles', 'UserController@index')->name('roles.index');
    Route::post('updateRoles/{user}', 'UserController@updateRole')->name('roles.updateRoles');
});

