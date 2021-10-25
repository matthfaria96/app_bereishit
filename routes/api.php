<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TorahController;
use App\Http\Controllers\KetuvimController;
use App\Http\Controllers\KetuvimChapterController;
use App\Http\Controllers\KetuvimVerseController;

use App\Http\Controllers\NeviimController;
use App\Http\Controllers\TorahChapterController;
use App\Http\Controllers\TorahVerseController;
use App\Http\Controllers\NeviimVerseController;
use App\Http\Controllers\NeviimChapterController;

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
Route::group(['middleware' => []], function () {
    Route::group(['prefix' => '/torah'], function () {
        Route::group(['prefix' => '/{bookId}'], function () {
            Route::get('/chapters/{chapterId}/verses', [TorahVerseController::class, 'index']);
            Route::get('/chapters/{chapterId}/verses/{id}', [TorahVerseController::class, 'show']);
        });
    
        Route::group(['prefix' => '/{bookId}'], function () {
            Route::get('/chapters', [TorahChapterController::class, 'index']);
            Route::get('/chapters/{id}', [TorahChapterController::class, 'show']);    
        });
    
        Route::get('/', [TorahController::class, 'index']);
        Route::get('/{id}', [TorahController::class, 'show']);
    });
    
    Route::group(['prefix' => '/neviim'], function () {
        Route::group(['prefix' => '/{bookId}'], function () {
            Route::get('/chapters/{chapterId}/verses', [NeviimVerseController::class, 'index']);
            Route::get('/chapters/{chapterId}/verses/{id}', [NeviimVerseController::class, 'show']);
        });
    
        Route::group(['prefix' => '/{bookId}'], function () {
            Route::get('/chapters', [NeviimChapterController::class, 'index']);
            Route::get('/chapters/{id}', [NeviimChapterController::class, 'show']);   
        });
    
        Route::get('/', [NeviimController::class, 'index']);
        Route::get('/{id}', [NeviimController::class, 'show']);
    });
    
    Route::group(['prefix' => '/ketuvim'], function () {
        Route::group(['prefix' => '/{bookId}'], function () {
            Route::get('/chapters/{chapterId}/verses', [KetuvimVerseController::class, 'index']);
            Route::get('/chapters/{chapterId}/verses/{id}', [KetuvimVerseController::class, 'show']);
        });
    
        Route::group(['prefix' => '/{bookId}'], function () {
            Route::get('/chapters', [KetuvimChapterController::class, 'index']);
            Route::get('/chapters/{id}', [KetuvimChapterController::class, 'show']);    
        });
    
        Route::get('/', [KetuvimController::class, 'index']);
        Route::get('/{id}', [KetuvimController::class, 'show']);
    });    
});
