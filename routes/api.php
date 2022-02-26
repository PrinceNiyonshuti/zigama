<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('user')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::post('create', [UserController::class, 'store']);
        Route::post('login', [UserController::class, 'login']);
    });

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('logout', [UserController::class, 'logout']);
    });
});
