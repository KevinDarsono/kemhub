<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\KementerianPerhubungan\{
    DashboardController,
    PerusahaanController
};


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'perusahaan'], function() {

    Route::get('/', [PerusahaanController::class, 'index'])->name('perusahaan.index');

});


