<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BankController;
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

Route::get('login', function () {
    return ['message' => 'Not Authorized , please login'];
})->name('login');

// User Authentication
Route::prefix('user')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::post('create', [UserController::class, 'store']);
        Route::post('login', [UserController::class, 'login']);
    });

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('logout', [UserController::class, 'logout']);
    });
});

// Admin Authentication
Route::prefix('admin')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::post('create', [AdminController::class, 'store']);
        Route::post('login', [AdminController::class, 'login']);
    });

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('logout', [AdminController::class, 'logout']);
    });
});

// Admin - Bank Actions
Route::prefix('bank')->middleware(['auth:sanctum'])->group(function () {
    Route::get('', [BankController::class, 'index']);
    Route::post('/store', [BankController::class, 'store']);
    Route::put('/update', [BankController::class, 'update']);
    Route::delete('delete', [BankController::class, 'destroy']);
});
