<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::middleware(['admin'])->group(function () {
            Route::resource('category', CategoryController::class);
        });
    });
});

