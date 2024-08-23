<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\User\CartController as CartController;
use App\Http\Controllers\Api\AuthController as ApiAuthController;
use App\Http\Controllers\Api\CartController as ApiCartController;

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


Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/register', [ApiAuthController::class, 'register']);

Route::get('/product', [HomeController::class, 'index']);
Route::get('/product/{id}', [HomeController::class, 'detail']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/cart', [HomeController::class, 'cart']);
    Route::get('/transaksi', [HomeController::class, 'transaksi']);
    Route::get('/transaksi/{id}', [HomeController::class, 'transaksiDetail']);

    Route::post('/cart', [ApiCartController::class, 'store']);
    Route::post('/cart/checkout', [ApiCartController::class, 'checkout']);
    Route::post('/cart/{id}', [ApiCartController::class, 'update']);
    Route::delete('/cart/{id}', [ApiCartController::class, 'destroy']);

    Route::post('/logout', [ApiAuthController::class, 'logout']);
});


Route::post('/callback', [CartController::class, 'callback']);
