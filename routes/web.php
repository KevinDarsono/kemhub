<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    AuthController,
    ImportController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if(Auth::check()) {
        $redirect_auth = route_redirect_user(Auth::user()->code_role);
        return redirect()->to($redirect_auth);
    }
    return redirect()->route('auth.login');
});

// AUTH

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('auth.login');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('auth.logout');

// END AUTH

Route::get('test-import', function(){
    return view('test-import');
});

Route::post('import-kendaraan-angkutan', [ImportController::class, 'importKendaraanAngkutan'])->name('import.kendaraan-angkutan');
