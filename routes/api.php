<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\UserAuthController;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [UserAuthController::class, 'login']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('logout', [UserAuthController::class, 'logout']);
    });
});

Route::group(['middleware' => 'auth:sanctum'], function() {
   // Route::get('logout', [UserAuthController::class, 'logout']);
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');;
    Route::get('/products/{product}', [ProductController::class, 'show']);
});



