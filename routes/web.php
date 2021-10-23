<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/web'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::group(['prefix' => '/manager'], function () {
        Route::get('/divisions', [DashboardController::class, 'managerDivisions']);
        Route::get('/books', [DashboardController::class, 'managerBooks']);
        Route::get('/chapters', [DashboardController::class, 'managerChapters']);
        Route::get('/verses', [DashboardController::class, 'managerVerses']);
    });
});