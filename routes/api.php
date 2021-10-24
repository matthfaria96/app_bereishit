<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TorahController;
use App\Http\Controllers\KetuvimController;
use App\Http\Controllers\NeviimController;
use App\Http\Controllers\TorahChapterController;
use App\Http\Controllers\TorahVerseController;

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
    Route::group(['prefix' => '/{bookId}'], function () {
        Route::get('/chapters/${chapterId}/verses', [TorahVerseController::class, 'index']);
        Route::get('/chapters/${chapterId}/verses/{id}', [TorahVerseController::class, 'show']);
        Route::post('/chapters/${chapterId}/verses', [TorahVerseController::class, 'store']);
        Route::put('/chapters/${chapterId}/verses/{id}', [TorahVerseController::class, 'update']);
        Route::delete('/chapters/${chapterId}/verses/{id}', [TorahVerseController::class, 'destroy']);    
    });


    Route::group(['prefix' => '/chapters'], function () {
        Route::get('/', [TorahChapterController::class, 'index']);
        Route::get('/{id}', [TorahChapterController::class, 'show']);
        Route::post('/', [TorahChapterController::class, 'store']);
        Route::put('/{id}', [TorahChapterController::class, 'update']);
        Route::delete('/{id}', [TorahChapterController::class, 'destroy']);

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
