<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * @OA\Info(title="Hixe API", version="0.1.0")
 * 
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * TODO: Apply authentication middleware
 */
Route::get('/users/search', [UserController::class, 'search']);