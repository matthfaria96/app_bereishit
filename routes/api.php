<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TorahController;
use App\Http\Controllers\KetuvimController;
use App\Http\Controllers\NeviimController;

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

Route::group(['prefix' => '/torah'], function () {
    Route::group(['prefix' => '/chapters'], function () {
        Route::group(['prefix' => '/verses'], function () {
            Route::get('/', [TorahController::class, 'index']);
            Route::get('/{id}', [TorahController::class, 'show']);
            Route::post('/', [TorahController::class, 'store']);
            Route::put('/{id}', [TorahController::class, 'update']);
            Route::delete('/{id}', [TorahController::class, 'destroy']);    
        });

        Route::get('/', [TorahController::class, 'index']);
        Route::get('/{id}', [TorahController::class, 'show']);
        Route::post('/', [TorahController::class, 'store']);
        Route::put('/{id}', [TorahController::class, 'update']);
        Route::delete('/{id}', [TorahController::class, 'destroy']);

    });

    Route::get('/', [TorahController::class, 'index']);
    Route::get('/{id}', [TorahController::class, 'show']);
    Route::post('/', [TorahController::class, 'store']);
    Route::put('/{id}', [TorahController::class, 'update']);
    Route::delete('/{id}', [TorahController::class, 'destroy']);
});

Route::group(['prefix' => '/neviimController'], function () {
    Route::get('/', [NeviimController::class, 'index']);
    Route::get('/{id}', [NeviimController::class, 'show']);
    Route::post('/', [NeviimController::class, 'store']);
    Route::put('/{id}', [NeviimController::class, 'update']);
    Route::delete('/{id}', [NeviimController::class, 'destroy']);
});

Route::group(['prefix' => '/ketuvim'], function () {
    Route::get('/', [KetuvimController::class, 'index']);
    Route::get('/{id}', [KetuvimController::class, 'show']);
    Route::post('/', [KetuvimController::class, 'store']);
    Route::put('/{id}', [KetuvimController::class, 'update']);
    Route::delete('/{id}', [KetuvimController::class, 'destroy']);
});
