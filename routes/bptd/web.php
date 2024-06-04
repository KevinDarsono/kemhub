<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\BPTD\{
    DashboardController,
    KendaraanAngkutanController,
    KendaraanController,
    PerusahaanController
};

use App\Http\Controllers\BPTD\Trayek\{
    KendaraanController as BptdTrayekKendaraanController,
    RuteController as BptdTrayekRuteController
};


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/kendaraan-angkutan', [KendaraanAngkutanController::class, 'index'])->name('kendaraan-angkutan');

Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan');

Route::get('/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan');

Route::group(['prefix' => 'trayek'], function() {

    Route::get('/kendaraan', [BptdTrayekKendaraanController::class, 'index'])->name('trayek.kendaraan');

    Route::get('/rute', [BptdTrayekRuteController::class, 'index'])->name('trayek.rute');

});