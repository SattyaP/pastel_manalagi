<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MitraController;
use App\Http\Controllers\Admin\PenyaluranController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('registrasi-mitra', [AuthController::class, 'regist_mitra_form'])->name('registrasi.mitra');
    Route::get('login', [AuthController::class, 'login_form'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('registrasi-mitra', [AuthController::class, 'regist_mitra'])->name('registrasi.mitra.post');
});

Route::get('product/{id}', [HomeController::class, 'showProduct'])->name('show.product');

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('pengajuan-mitra', [MitraController::class, 'pengajuanMitra'])->name('pengajuan.mitra');

        Route::resource('produks', ProdukController::class);
        Route::resource('feedback', FeedbackController::class);
        Route::resource('penyaluran', PenyaluranController::class);
    });

Route::get('logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');
