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
    UjiBlueController,
};
use App\Http\Controllers\Administrator\DataIntegration\Blue\KendaraanController as BlueKendaraanController;

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

Route::group(['prefix' => 'uji-blue'], function() {
    Route::controller(UjiBlueController::class)->group(function(){
        Route::get('/find', 'show')->name('uji-blue.find');
        Route::get('/list', 'index')->name('uji-blue.list');
    });
});

Route::group(['prefix' => 'persetujuan'], function(){
    Route::controller(PersetujuanController::class)->group(function(){
        Route::get('list', 'index')->name('persetujuan.list');
        Route::post('setujui', 'setujui')->name('persetujuan.setujui');
    });
});

Route::middleware(['token_data_integration'])->group(function () {
    Route::prefix('blue')->group(function () {
        Route::prefix('kendaraan')->group(function () {
            Route::controller(BlueKendaraanController::class)->group(function () {
                Route::get('/find', 'find')->name('blue.kendaraan.find');
                Route::get('/list', 'list')->name('blue.kendaraan.list');
            });
        });
    });
});
