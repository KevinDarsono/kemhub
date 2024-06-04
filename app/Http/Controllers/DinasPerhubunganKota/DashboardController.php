<?php

namespace App\Http\Controllers\DinasPerhubunganKota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $term) {
        return view('dishub_kota.dashboard',[
            'title'     => 'Dashboard'
        ]);
    }
}
