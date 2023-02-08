<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::get('verify/{token}', [AuthController::class, 'verifyEmail']);
    ...
    Route::get('/users/{id}', function ($id) {
        return User::findOrFail($id);
    });
});

Route::group(['prefix' => 'users'], function () {
    Route::get('auth', [UserController::class, 'getAuthUser']);
});*/

// Route::namespace('Api')->group(function(){

    Route::post('register', [AuthController::class, 'register']);
    Route::post('complete', [AuthController::class, 'complete']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('verify/{token}', [AuthController::class, 'verifyEmail']);

    Route::group(['middleware'=>'jwt.verify'],function(){
        Route::get('user', [AuthController::class, 'getUser']);
    });

// });
