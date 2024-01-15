<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware('auth:api')->group(function () {
    Route::post('/create', [ProductController::class, 'createProduct']);
    Route::patch('/update/{product_id}', [ProductController::class, 'updateProduct']);
    Route::delete('/delete/{product_id}', [ProductController::class, 'deleteProduct']);
    Route::get('/read', [ProductController::class, 'read']);
});

