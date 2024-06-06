<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Constants\HttpStatusCodes;

use App\Http\Controllers\KementerianPerhubungan\API\{
    PerusahaanController as APIPerusahaanController
};

// other
use App\Http\Controllers\Administrator\API\{
    ApprovalFlowConfigController,
    DashboardController as APIDashboardController,
    KendaraanAngkutanController,
    UserGroupController,
    UserManagementController
};

use App\Http\Controllers\Administrator\API\Master\ {
    JenisAngkutanController,
    JenisLayananController,
    KabupatenController,
    KotaController,
    ProvinsiController,
    PerusahaanController,
    KendaraanController,
    RuteTrayekController,
    TrayekController,
    UnitKerjaController,
};


Route::fallback(function() {
    return response()->json([
        'status_code'  => HttpStatusCodes::HTTP_NOT_FOUND,
        'error'   => true,
        'message' => 'URL Not Found'
    ],HttpStatusCodes::HTTP_NOT_FOUND);
});


Route::group(['prefix' => 'perusahaan'], function() {

    Route::get('/list', [APIPerusahaanController::class, 'list'])->name('perusahaan.list');

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
            Route::post('/create', 'store')->name('master.jenis-angkutan.create');
            Route::put('/update', 'update')->name('master.jenis-angkutan.update');
            Route::delete('/delete', 'destroy')->name('master.jenis-angkutan.destroy');
        });
    });
    Route::group(['prefix' => 'jenis-layanan'], function() {
        Route::controller(JenisLayananController::class)->group(function(){
            Route::get('/find', 'show')->name('master.jenis-layanan.find');
            Route::get('/list', 'index')->name('master.jenis-layanan.list');
            Route::post('/create', 'store')->name('master.jenis-layanan.create');
            Route::put('/update', 'update')->name('master.jenis-layanan.update');
            Route::delete('/delete', 'destroy')->name('master.jenis-layanan.destroy');
        });
    });
    Route::group(['prefix' => 'trayek'], function() {
        Route::controller(TrayekController::class)->group(function(){
            Route::get('/find', 'show')->name('master.trayek.find');
            Route::get('/list', 'index')->name('master.trayek.list');
            Route::post('/create', 'store')->name('master.trayek.create');
            Route::put('/update', 'update')->name('master.trayek.update');
            Route::delete('/delete', 'destroy')->name('master.trayek.destroy');
        });
    });
    Route::group(['prefix' => 'rute-trayek'], function() {
        Route::controller(RuteTrayekController::class)->group(function(){
            Route::get('/find', 'show')->name('master.rute-trayek.find');
            Route::get('/list', 'index')->name('master.rute-trayek.list');
            Route::post('/create', 'store')->name('master.rute-trayek.create');
            Route::put('/update', 'update')->name('master.rute-trayek.update');
            Route::delete('/delete', 'destroy')->name('master.rute-trayek.destroy');
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

Route::group(['prefix' => 'user-management'], function() {
    Route::controller(UserManagementController::class)->group(function(){
        Route::get('/find', 'show')->name('user-management.find');
        Route::get('/list', 'index')->name('user-management.list');
    });
});

Route::group(['prefix' => 'konfigurasi-alur-persetujuan'], function() {
    Route::controller(ApprovalFlowConfigController::class)->group(function(){
        Route::get('/find', 'show')->name('konfigurasi-alur-persetujuan.find');
        Route::get('/list', 'index')->name('konfigurasi-alur-persetujuan.list');
        Route::post('/create', 'store')->name('konfigurasi-alur-persetujuan.create');
        Route::put('/update', 'update')->name('konfigurasi-alur-persetujuan.update');
        Route::delete('/delete', 'destroy')->name('konfigurasi-alur-persetujuan.destroy');
    });
});

Route::group(['prefix' => 'pengelolaan-grup-pengguna'], function() {
    Route::controller(UserGroupController::class)->group(function(){
        Route::get('/find', 'show')->name('pengelolaan-grup-pengguna.find');
        Route::get('/list', 'index')->name('pengelolaan-grup-pengguna.list');
        Route::post('/create', 'store')->name('pengelolaan-grup-pengguna.create');
        Route::put('/update', 'update')->name('pengelolaan-grup-pengguna.update');
        Route::delete('/delete', 'destroy')->name('pengelolaan-grup-pengguna.destroy');
    });
});


Route::group(['prefix' => 'kendaraan-angkutan'], function() {
    Route::controller(KendaraanAngkutanController::class)->group(function(){
        Route::get('/find', 'show')->name('kendaraan-angkutan.find');
        Route::get('/list', 'index')->name('kendaraan-angkutan.list');
    });
});


