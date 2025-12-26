<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
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
});

Route::middleware('auth')->group(function () {
    Route::get('/beranda', HomeController::class);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::middleware('role:admin')->group(function () {
        Route::prefix('/users')->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::post('/create', [UserController::class, 'store']);
            Route::put('/update/{id}', [UserController::class, 'update']);
            Route::delete('/delete/{id}', [UserController::class, 'destroy']);
        });

        Route::prefix('/spp')->group(function () {
            Route::get('/', [FeeController::class, 'index']);
            Route::post('/create', [FeeController::class, 'store']);
            Route::put('/update/{id}', [FeeController::class, 'update']);
            Route::delete('/delete/{id}', [FeeController::class, 'destroy']);
        });

        Route::prefix('/kelas')->group(function () {
            Route::get('/', [GradeController::class, 'index']);
            Route::post('/create', [GradeController::class, 'store']);
            Route::put('/update/{id}', [GradeController::class, 'update']);
            Route::delete('/delete/{id}', [GradeController::class, 'destroy']);
        });

        Route::prefix('/siswa')->group(function () {
            Route::get('/', [StudentController::class, 'index']);
            Route::post('/create', [StudentController::class, 'store']);
            Route::put('/update/{id}', [StudentController::class, 'update']);
            Route::delete('/delete/{id}', [StudentController::class, 'destroy']);
        });
    });

    Route::prefix('/transaksi')->group(function () {
        Route::get('/', [TransactionController::class, 'index']);
        Route::get('/{nis}', [TransactionController::class, 'payment']);
        Route::post('/{nis}/pay', [TransactionController::class, 'pay']);
    });

    Route::prefix('/laporan')->group(function(){
        Route::get('/', [ReportController::class, 'index']);
        Route::get('/cetak', [ReportController::class, 'print']);
    });

    Route::prefix('/kartu')->group(function(){
        Route::get('/', [CardController::class, 'index']);
        Route::get('/{nis}', [CardController::class, 'print']);
    });
});
