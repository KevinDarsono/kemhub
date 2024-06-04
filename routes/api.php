<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Constants\HttpStatusCodes;
use App\Http\Controllers\{
    AuthController
};


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::fallback(function() {
    return response()->json([
        'status_code'  => HttpStatusCodes::HTTP_NOT_FOUND,
        'error'   => true,
        'message' => 'URL Not Found'
    ],HttpStatusCodes::HTTP_NOT_FOUND);
});

// AUTH

Route::post('/login', [AuthController::class, 'submitLogin'])->middleware('guest')->name('api.auth.login');

// END AUTH

