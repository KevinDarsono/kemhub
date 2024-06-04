<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Constants\HttpStatusCodes;

use App\Http\Controllers\Administrator\API\Master\ {
    PerusahaanController,
    KendaraanController,
    RuteTrayekController,
    TrayekController,
};

use App\Http\Controllers\Administrator\API\{
    KendaraanAngkutanController,
    PersetujuanController,
};

Route::fallback(function() {
    return response()->json([
        'status_code'  => HttpStatusCodes::HTTP_NOT_FOUND,
        'error'   => true,
        'message' => 'URL Not Found'
    ],HttpStatusCodes::HTTP_NOT_FOUND);
});

Route::group(['prefix' => 'master'], function() {
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
        });
    });
    Route::group(['prefix' => 'kendaraan'], function() {
        Route::controller(KendaraanController::class)->group(function(){
            Route::get('/find', 'show')->name('master.kendaraan.find');
            Route::get('/list', 'index')->name('master.kendaraan.list');
        });
    });
});

Route::group(['prefix' => 'kendaraan-angkutan'], function() {
    Route::controller(KendaraanAngkutanController::class)->group(function(){
        Route::get('/find', 'show')->name('kendaraan-angkutan.find');
        Route::get('/list', 'index')->name('kendaraan-angkutan.list');
        Route::get('persetujuan', 'persetujuan')->name('kendaraan-angkutan.persetujuan');
    });
});

Route::group(['prefix' => 'persetujuan'], function(){
    Route::controller(PersetujuanController::class)->group(function(){
        Route::get('list', 'index')->name('persetujuan.list');
        Route::post('setujui', 'setujui')->name('persetujuan.setujui');

    });
});
