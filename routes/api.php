<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('v1/login', [UserController::class, 'login']);
Route::post('v1/register', [UserController::class, 'register']);
Route::post('v1/logout', [UserController::class, 'logout']);

Route::get('v1/category', [CategoryController::class, 'fetch']);
Route::get('v1/product', [ProductController::class, 'fetch']);

