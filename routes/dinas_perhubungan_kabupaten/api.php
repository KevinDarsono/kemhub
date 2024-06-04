<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Constants\HttpStatusCodes;

use App\Http\Controllers\DinasPerhubunganKota\API\{
    DashboardController as APIDashboardController,
};

use App\Http\Controllers\Administrator\API\{
    KendaraanAngkutanController,
};

use App\Http\Controllers\Administrator\API\Master\ {
    JenisAngkutanController,
    JenisLayananController,
    KabupatenController,
    KotaController,
    ProvinsiController,
    // PerusahaanController,
    // KendaraanController,
    RuteTrayekController,
    TrayekController,
    UnitKerjaController,
};

use App\Http\Controllers\DinasPerhubunganKota\API\Master\{
    KendaraanController,
    PerusahaanController,
};



Route::fallback(function() {
    return response()->json([
        'status_code'  => HttpStatusCodes::HTTP_NOT_FOUND,
        'error'   => true,
        'message' => 'URL Not Found'
    ],HttpStatusCodes::HTTP_NOT_FOUND);
});

// MASTER
Route::group(['prefix' => 'master'], function() {
    Route::get('code-role', function(){
        return response()->json([
            'status_code'  => HttpStatusCodes::HTTP_OK,
            'error'   => false,
            'message' => 'Success',
            'data' => \App\Constants\Roles::getAllRole()
        ],HttpStatusCodes::HTTP_OK);
    });
    Route::group(['prefix' => 'jenis-angkutan'], function() {
        Route::controller(JenisAngkutanController::class)->group(function(){
            Route::get('/find', 'show')->name('master.jenis-angkutan.find');
            Route::get('/list', 'index')->name('master.jenis-angkutan.list');
        });
    });
    Route::group(['prefix' => 'jenis-layanan'], function() {
        Route::controller(JenisLayananController::class)->group(function(){
            Route::get('/find', 'show')->name('master.jenis-layanan.find');
            Route::get('/list', 'index')->name('master.jenis-layanan.list');
        });
    });
    Route::group(['prefix' => 'trayek'], function() {
        Route::controller(TrayekController::class)->group(function(){
            Route::get('/find', 'show')->name('master.trayek.find');
            Route::get('/list', 'index')->name('master.trayek.list');
        });
    });
    Route::group(['prefix' => 'rute-trayek'], function() {
        Route::controller(RuteTrayekController::class)->group(function(){
            Route::get('/find', 'show')->name('master.rute-trayek.find');
            Route::get('/list', 'index')->name('master.rute-trayek.list');
        });
    });
    Route::group(['prefix' => 'perusahaan'], function() {
        Route::controller(PerusahaanController::class)->group(function(){
            Route::get('/find', 'show')->name('master.perusahaan.find');
            Route::get('/list', 'index')->name('master.perusahaan.list');
            Route::post('/create', 'store')->name('master.perusahaan.create');
            Route::put('/update', 'update')->name('master.perusahaan.update');
            Route::delete('/delete', 'destroy')->name('master.perusahaan.destroy');
        });
    });
    Route::group(['prefix' => 'kendaraan'], function() {
        Route::controller(KendaraanController::class)->group(function(){
            Route::get('/find', 'show')->name('master.kendaraan.find');
            Route::get('/list', 'index')->name('master.kendaraan.list');
            Route::post('/create', 'store')->name('master.kendaraan.create');
            Route::put('/update', 'update')->name('master.kendaraan.update');
            Route::delete('/delete', 'destroy')->name('master.kendaraan.destroy');
        });
    });
    Route::group(['prefix' => 'unit-kerja'], function() {
        Route::controller(UnitKerjaController::class)->group(function(){
            Route::get('/find', 'show')->name('master.unit-kerja.find');
            Route::get('/list', 'index')->name('master.unit-kerja.list');
        });
    });
    Route::group(['prefix' => 'provinsi'], function() {
        Route::controller(ProvinsiController::class)->group(function(){
            Route::get('/find', 'show')->name('master.provinsi.find');
            Route::get('/list', 'index')->name('master.provinsi.list');
        });
    });
    Route::group(['prefix' => 'kota'], function() {
        Route::controller(KotaController::class)->group(function(){
            Route::get('/find', 'show')->name('master.kota.find');
            Route::get('/list', 'index')->name('master.kota.list');
        });
    });
    Route::group(['prefix' => 'kabupaten'], function() {
        Route::controller(KabupatenController::class)->group(function(){
            Route::get('/find', 'show')->name('master.kabupaten.find');
            Route::get('/list', 'index')->name('master.kabupaten.list');
        });
    });
});
// END MASTER

Route::group(['prefix' => 'kendaraan-angkutan'], function() {
    Route::controller(KendaraanAngkutanController::class)->group(function(){
        Route::get('/find', 'show')->name('kendaraan-angkutan.find');
        Route::get('/list', 'index')->name('kendaraan-angkutan.list');
        Route::post('/create', 'store')->name('kendaraan-angkutan.create');
        Route::put('/update', 'update')->name('kendaraan-angkutan.update');
        Route::delete('/delete', 'destroy')->name('kendaraan-angkutan.destroy');
        Route::get('persetujuan', 'persetujuan')->name('kendaraan-angkutan.persetujuan');
    });
});
