<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Administrator\{
    DashboardController,
    KendaraanAngkutanController,
    KendaraanController,
    PerusahaanController
};

use App\Http\Controllers\Administrator\MasterData\{
    ProvinsiController,
    KotaController,
    KabupatenController,
    JenisAngkutanController,
    JenisLayananController,
    UnitKerjaController
};
use App\Http\Controllers\Administrator\Setting\GroupUserContoller;
use App\Http\Controllers\Administrator\Trayek\{
    KendaraanController as AdminTrayekKendaraanController,
    RuteController as AdminTrayekRuteController
};



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::group(['prefix' => 'master-data'], function() {

    Route::get('/provinsi', [ProvinsiController::class, 'index'])->name('master-data.provinsi');

    Route::get('/kota', [KotaController::class, 'index'])->name('master-data.kota');

    Route::get('/kabupaten', [KabupatenController::class, 'index'])->name('master-data.kabupaten');

    Route::get('/jenis-angkutan', [JenisAngkutanController::class, 'index'])->name('master-data.jenis-angkutan');

    Route::get('/jenis-layanan', [JenisLayananController::class, 'index'])->name('master-data.jenis-layanan');

    Route::get('/unit-kerja', [UnitKerjaController::class, 'index'])->name('master-data.unit-kerja');



});

Route::get('/kendaraan-angkutan', [KendaraanAngkutanController::class, 'index'])->name('kendaraan-angkutan');

Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan');

Route::get('/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan');

Route::group(['prefix' => 'trayek'], function() {

    Route::get('/kendaraan', [AdminTrayekKendaraanController::class, 'index'])->name('trayek.kendaraan');

    Route::get('/rute', [AdminTrayekRuteController::class, 'index'])->name('trayek.rute');

});

Route::get('/pengelola-group-pengguna', [GroupUserContoller::class, 'index'])->name('pengelola-group-pengguna');


