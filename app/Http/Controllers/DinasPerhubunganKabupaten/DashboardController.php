<?php

namespace App\Http\Controllers\DinasPerhubunganKabupaten;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $term) {
        return view('dishub_kab.dashboard',[
            'title'     => 'Dashboard'
        ]);
    }
}
