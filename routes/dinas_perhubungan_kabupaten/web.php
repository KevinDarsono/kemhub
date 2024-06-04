<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DinasPerhubunganKabupaten\{
    DashboardController,
    KendaraanController,
    PerusahaanController,
    KendaraanAngkutanController,
    TrayekController,
    RuteTrayekController
};


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::group(['prefix' => 'kendaraan'], function() {

    Route::controller(KendaraanController::class)->group(function () {
        Route::get('/', 'index')->name('kendaraan.index');
        Route::get('/create', 'create')->name('kendaraan.create');
        Route::get('/{id}', 'show')->name('kendaraan.show');
        Route::get('/edit/{id}', 'edit')->name('kendaraan.edit');
    });

});

Route::group(['prefix' => 'perusahaan'], function() {

    Route::controller(PerusahaanController::class)->group(function () {
        Route::get('/', 'index')->name('perusahaan.index');
        Route::get('/create', 'create')->name('perusahaan.create');
        Route::get('/{id}', 'show')->name('perusahaan.show');
        Route::get('/edit/{id}', 'edit')->name('perusahaan.edit');
    });

});

Route::group(['prefix' => 'kendaraan-angkutan'], function() {

    Route::controller(KendaraanAngkutanController::class)->group(function () {
        Route::get('/', 'index')->name('kendaraan-angkutan.index');
    });

});

Route::group(['prefix' => 'kendaraan-angkutan'], function() {

    Route::controller(KendaraanAngkutanController::class)->group(function () {
        Route::get('/', 'index')->name('kendaraan-angkutan.index');
    });

});

Route::group(['prefix' => 'trayek'], function() {

    Route::get('/', [TrayekController::class, 'index'])->name('trayek.index');

    Route::get('/rute', [RuteTrayekController::class, 'index'])->name('rute-trayek.index');

});