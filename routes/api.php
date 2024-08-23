<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::prefix('dashboard')
//     ->group(function() {
//         Route::resource('barang', DashboardBarangController::class);
//         Route::resource('barang-masuk', DashboardBarangMasukController::class);
//         Route::resource('barang-keluar', DashboardBarangKeluarController::class);
//         Route::resource('supplier', DashboardSupplierController::class);
//         Route::resource('transaksi', DashboardTransaksiController::class);
//     });