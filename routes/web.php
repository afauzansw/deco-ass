<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::post('checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('checkout/{id}/success', [HomeController::class, 'checkoutSuccess'])->name('checkout.success');

Route::post('transaction/track', [HomeController::class, 'checkoutSuccess'])->name('transaction.track');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'attempt'])->name('attempt');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('dashboard')->name('dashboard.')->middleware([AuthMiddleware::class])->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('index');

    Route::prefix('transaction')->name('transaction.')->group(function () {
        Route::get('', [TransactionController::class, 'index'])->name('index');
        Route::get('{id}', [TransactionController::class, 'show'])->name('show');
        Route::put('{id}/status', [TransactionController::class, 'status'])->name('status');
    });

    Route::prefix('setting')->name('setting.')->group(function () {
        Route::get('', [SettingController::class, 'index'])->name('index');
        Route::put('update', [SettingController::class, 'update'])->name('update');
    });
});

