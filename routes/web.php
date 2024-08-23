<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\User\LandingController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

############### Admin Route ################
# Auth
Route::get('/admin/login', [AuthController::class, 'index']);
Route::post('/admin/login', [AuthController::class, 'login']);


Route::middleware('IsAdmin')->group(function () {
    Route::get('/admin/logout', [AuthController::class, 'logout']);

    # Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);

    # Product
    Route::get('/admin/product', [ProductController::class, 'index']);
    Route::post('/admin/product', [ProductController::class, 'store']);
    Route::put('/admin/product/{id}', [ProductController::class, 'update']);
    Route::delete('/admin/product/{id}', [ProductController::class, 'destroy']);

    # Category
    Route::get('/admin/category', [CategoryController::class, 'index']);
    Route::post('/admin/category', [CategoryController::class, 'store']);
    Route::put('/admin/category/{id}', [CategoryController::class, 'update']);
    Route::delete('/admin/category/{id}', [CategoryController::class, 'destroy']);

    # Transaksi
    Route::get('/admin/transaksi', [TransaksiController::class, 'index']);

    # User
    Route::get('/admin/user', [UserController::class, 'index']);
});


############### User Route ################
# Auth
Route::get('/login', [UserAuthController::class, 'indexlogin']);
Route::post('/login', [UserAuthController::class, 'login']);
Route::get('/register', [UserAuthController::class, 'indexregister']);
Route::post('/register', [UserAuthController::class, 'register']);


# Landing
Route::get('/', [LandingController::class, 'index']);
Route::get('/detail/{id}', [LandingController::class, 'detail']);


Route::middleware('IsUser')->group(function () {

    Route::get('/logout', [UserAuthController::class, 'logout']);

    Route::get('/cart', [LandingController::class, 'cart']);

    # Cart
    Route::post('/cart', [CartController::class, 'store']);
    Route::post('/cart/update', [CartController::class, 'update']);
    Route::post('/cart/checkout', [CartController::class, 'checkout']);
    Route::get('/cart/checkout/{id}', [CartController::class, 'checkoutbyid']);
    Route::delete('/cart/{id}', [CartController::class, 'destroy']);


    # My Account
    Route::get('/my-account', [LandingController::class, 'transaksi']);
    Route::post('/updateprofil', [UserAuthController::class, 'updateprofil']);
});


