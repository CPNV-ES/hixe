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

Route::resources([
    'hikes' => HikeController::class,
    'multiHikes' => MultiHikesController::class,
    'profile' => UserController::class,
]);

// Hikes registration
Route::get('register_hike/{id}', 'hikeController@registerToHike')->name('hike.registerhike');
Route::get('unregister_hike/{id}', 'hikeController@unregisterToHike')->name('hike.unregisterhike');

Route::get('roles', 'UserController@index')->name('roles.index');
Route::post('updateRoles/{user}', 'UserController@updateRole')->name('roles.updateRoles');


// Calendar
Route::get('hikes_calendar', 'HikeCalendarController@index');
Route::get('hikes_calendar/{date}', 'HikeCalendarController@show');

//Authentification
Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/callback', 'Auth\AuthController@handleProviderCallback');
Route::post('auth/logout', 'Auth\AuthController@logoutUser');

// Autocomplete input
Route::post('hikes/create/fetch', 'HikeController@fetch')->name('autocomplete.fetch');

// Import hikes with csv file
//Route::resource('importHikes', 'ImportHikesController');
Route::post('import', 'ImportController@store')->name('import.store');
