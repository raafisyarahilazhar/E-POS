<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Dashboard\DashboardBarangController;
use App\Http\Controllers\Dashboard\DashboardBarangMasukController;
use App\Http\Controllers\Dashboard\DashboardBarangKeluarController;
use App\Http\Controllers\Dashboard\DashboardLaporanController;
use App\Http\Controllers\Dashboard\DashboardSupplierController;
use App\Http\Controllers\Dashboard\DashboardTransaksiController;

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::prefix('dashboard')
    ->group(function() {
        Route::resource('barang', DashboardBarangController::class);
        Route::resource('barang-masuk', DashboardBarangMasukController::class);
        Route::resource('barang-keluar', DashboardBarangKeluarController::class);
        Route::resource('laporan', DashboardLaporanController::class);
        Route::resource('supplier', DashboardSupplierController::class);
        Route::resource('transaksi', DashboardTransaksiController::class);
    });


Route::resource('kasir', PosController::class)->middleware('auth');
// Route::get('/kasir', [PosController::class, 'index']);
// Route::get('/user', [LoginController::class, 'index']);
Route::get('/masuk', [LoginController::class, 'index'])->name('masuk');
Route::post('/masuk', [LoginController::class, 'login']);
Route::get('/user', [RegistrationController::class, 'index']);
Route::get('/registration', [RegistrationController::class, 'create'])->middleware('auth');
Route::post('/registration', [RegistrationController::class, 'store']);