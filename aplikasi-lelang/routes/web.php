<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/process', [AuthController::class, 'loginProcess']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register/process', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);

    Route::prefix('/admin')->middleware('role:admin')->group(function () {
        Route::get('/beranda', [HomeController::class, 'admin']);

        Route::prefix('/users')->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::post('/create', [UserController::class, 'store']);
            Route::put('/update/{id}', [UserController::class, 'update']);
            Route::delete('/delete/{id}', [UserController::class, 'destroy']);
        });

        Route::prefix('/barang')->group(function () {
            Route::get('/', [ProductController::class, 'index']);
            Route::post('/create', [ProductController::class, 'store']);
            Route::put('/update/{id}', [ProductController::class, 'update']);
            Route::delete('/delete/{id}', [ProductController::class, 'destroy']);
        });

        Route::prefix('/transaksi')->group(function () {
            Route::get('/lelang', [TransactionController::class, 'index']);
            Route::get('/lelang/{id}', [TransactionController::class, 'show']);

            Route::post('/lelang/buka/{product}', [TransactionController::class, 'open'])->name('lelang.buka');
            Route::post('/lelang/tutup/{auction}', [TransactionController::class, 'close'])->name('lelang.tutup');
            Route::get('/riwayat', [TransactionController::class, 'history']);
            Route::get('/riwayat/{id}', [TransactionController::class, 'historyDetail']);
        });

        Route::prefix('/laporan')->group(function(){
            Route::get('/', [ReportController::class, 'index'])->name('laporan.lelang');
            Route::get('/cetak', [ReportController::class, 'print'])->name('laporan.lelang.cetak');
        });
    });

    Route::prefix('/masyarakat')->middleware('role:masyarakat')->group(function () {
        Route::get('/beranda', [HomeController::class, 'masyarakat']);

        Route::prefix('/transaksi')->group(function () {
            Route::get('/lelang', [TransactionController::class, 'index']);
            Route::get('/lelang/{id}', [TransactionController::class, 'show']);

            Route::post('/lelang/bid/{auction}', [TransactionController::class, 'bid'])->name('lelang.bid');
            Route::get('/riwayat', [TransactionController::class, 'history']);
            Route::get('/riwayat/{id}', [TransactionController::class, 'historyDetail']);
        });
    });
});
