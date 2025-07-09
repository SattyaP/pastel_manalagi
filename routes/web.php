<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MitraController;
use App\Http\Controllers\Admin\PenyaluranController;
use App\Http\Controllers\Mitra\FeedbackController as MitraFeedbackController;
use App\Http\Controllers\Mitra\PenawaranController;
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
        Route::patch('mitra/{id}/verifikasi', [MitraController::class, 'verifikasiMitra'])->name('mitra.verifikasi');

        Route::get('penawaran/show/{id}', [PenyaluranController::class, 'detailPenawaran'])->name('penawaran.show');
        Route::get('penawaran', [PenyaluranController::class, 'penawaran'])->name('penyaluran.penawaran');
        Route::get('tambah-penawaran', [PenyaluranController::class, 'buatPenawaran'])->name('penawaran.create');
        Route::post('tambah-penawaran', [PenyaluranController::class, 'storePenawaran'])->name('penawaran.store');
        Route::post('penyaluran/upload-dokumentasi/{id}', [PenyaluranController::class, 'uploadDokumentasi'])->name('penyaluran.upload_dokumentasi');

        Route::resource('produks', ProdukController::class);
        Route::resource('feedback', FeedbackController::class);
        Route::resource('penyaluran', PenyaluranController::class);
        Route::resource('mitra', MitraController::class);
    });

Route::middleware(['auth', 'role:mitra'])
    ->prefix('mitra')
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'mitraIndex'])->name('mitra.dashboard');
    });

Route::middleware(['auth', 'role:mitra', 'verified'])
    ->prefix('mitra')
    ->group(function () {
        Route::get('penawaran', [PenawaranController::class, 'penawaranMitra'])->name('penawaran.mitra');
        Route::get('feedback', [MitraFeedbackController::class, 'index'])->name('mitra.feedback.index');
        Route::get('feedback/create/{id}', [MitraFeedbackController::class, 'create'])->name('mitra.feedback.create');
        Route::post('feedback/store', [MitraFeedbackController::class, 'store'])->name('mitra.feedback.store');
    });

Route::post('logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('account', [AuthController::class, 'account'])->name('account.profile');
    Route::patch('account/update', [AuthController::class, 'updateAccount'])->name('account.update');
    Route::get('account/change-password', [AuthController::class, 'changePassword'])->name('account.change-password');
    Route::patch('account/update-password', [AuthController::class, 'updatePassword'])->name('account.update-password');
});
