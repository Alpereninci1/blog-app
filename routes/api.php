<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);


Route::group(['middleware' => 'auth:sanctum','prefix' => 'users'], function ($router) {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('create', [UserController::class, 'store']);
    Route::get('/', [UserController::class, 'index']);
    Route::get('detail/{id}', [UserController::class, 'show']);
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('update/{id}', [UserController::class, 'update']);
    Route::post('update-profile', [UserController::class, 'updateProfile']);
    Route::post('delete/{id}', [UserController::class, 'destroy']);

});