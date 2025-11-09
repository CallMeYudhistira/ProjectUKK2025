<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Models\Cart;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/proses', [AuthController::class, 'loginProcess']);
});

Route::middleware('auth')->group(function () {
    Route::get('/beranda', HomeController::class);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);

    Route::middleware('role:admin')->group(function () {
        Route::prefix('/users')->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::get('/search', [UserController::class, 'search']);
            Route::post('/create', [UserController::class, 'create']);
            Route::put('/update/{id}', [UserController::class, 'update']);
            Route::delete('/delete/{id}', [UserController::class, 'delete']);
        });

        Route::prefix('/kategori')->group(function () {
            Route::get('/', [CategoryController::class, 'index']);
            Route::get('/search', [CategoryController::class, 'search']);
            Route::post('/create', [CategoryController::class, 'create']);
            Route::put('/update/{id}', [CategoryController::class, 'update']);
            Route::delete('/delete/{id}', [CategoryController::class, 'delete']);
        });

        Route::prefix('/satuan')->group(function () {
            Route::get('/', [UnitController::class, 'index']);
            Route::get('/search', [UnitController::class, 'search']);
            Route::post('/create', [UnitController::class, 'create']);
            Route::put('/update/{id}', [UnitController::class, 'update']);
            Route::delete('/delete/{id}', [UnitController::class, 'delete']);
        });

        Route::prefix('/produk')->group(function () {
            Route::get('/', [ProductController::class, 'index']);
            Route::get('/search', [ProductController::class, 'search']);
            Route::post('/create', [ProductController::class, 'create']);
            Route::put('/update/{id}', [ProductController::class, 'update']);
            Route::delete('/delete/{id}', [ProductController::class, 'delete']);
        });
    });

    Route::prefix('/transaksi')->group(function () {
        Route::get('/', [TransactionController::class, 'index']);
        Route::get('/search', [TransactionController::class, 'search']);
        Route::post('/store', [TransactionController::class, 'store']);
    });

    Route::prefix('/cart')->group(function () {
        Route::post('/store', [CartController::class, 'store']);
        Route::delete('/delete/{id}', [CartController::class, 'delete']);
    });

    Route::prefix('/laporan')->group(function () {
        Route::get('/', [ReportController::class, 'index']);
        Route::get('/filter', [ReportController::class, 'filter']);
        Route::get('/detail/{id}', [ReportController::class, 'detail']);
        Route::get('/cetak/excel', [ReportController::class, 'exportExcel']);
        Route::get('/cetak/pdf', [ReportController::class, 'exportPDF']);
    });
});