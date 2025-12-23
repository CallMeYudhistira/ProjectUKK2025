<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
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

Route::middleware('guest')->group(function(){
    Route::get('/', [AuthController::class, 'index']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/loginProcess', [AuthController::class, 'loginProcess']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/registerProcess', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function(){
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);

    Route::prefix('/admin')->middleware('role:admin')->group(function(){
        Route::get('/beranda', [HomeController::class, 'admin']);

        Route::prefix('/users')->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::get('/search', [UserController::class, 'search']);
            Route::post('/create', [UserController::class, 'create']);
            Route::put('/update/{id}', [UserController::class, 'update']);
            Route::delete('/delete/{id}', [UserController::class, 'delete']);
        });

        Route::prefix('/periode')->group(function () {
            Route::get('/', [PeriodController::class, 'index']);
            Route::post('/create', [PeriodController::class, 'create']);
            Route::put('/update/{id}', [PeriodController::class, 'update']);
            Route::delete('/delete/{id}', [PeriodController::class, 'delete']);
        });

        Route::prefix('/kendaraan')->group(function () {
            Route::get('/', [VehicleController::class, 'index']);
            Route::get('/search', [VehicleController::class, 'search']);
            Route::post('/create', [VehicleController::class, 'create']);
            Route::put('/update/{id}', [VehicleController::class, 'update']);
            Route::delete('/delete/{id}', [VehicleController::class, 'delete']);
        });

        Route::prefix('/transaksi')->group(function(){
            Route::get('/cicilan', [TransactionController::class, 'instalment']);
            Route::put('/cicilan/edit/{id}', [TransactionController::class, 'editStatus']);
            Route::get('/cicilan/detail/{id}', [TransactionController::class, 'detail']);
            Route::post('/cicilan/bayar/{id}', [TransactionController::class, 'pay']);
        });

        Route::prefix('/laporan')->group(function(){
            Route::get('/', [ReportController::class, 'index']);
            Route::get('/cetak', [ReportController::class, 'print']);
        });
    });

    Route::prefix('/nasabah')->middleware('role:nasabah')->group(function(){
        Route::get('/beranda', [HomeController::class, 'nasabah']);

        Route::prefix('/transaksi')->group(function(){
            Route::get('/kendaraan', [TransactionController::class, 'vehicle']);
            Route::get('/kendaraan/search', [TransactionController::class, 'search']);
            Route::post('/kendaraan/beli/{id}', [TransactionController::class, 'store']);

            Route::get('/cicilan', [TransactionController::class, 'instalment']);
            Route::get('/cicilan/detail/{id}', [TransactionController::class, 'detail']);
        });
    });
});
