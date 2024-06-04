<?php

namespace App\Http\Controllers\DinasPerhubunganKabupaten;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuteTrayekController extends Controller
{
    public function index(Request $term) {
        return view('dishub_kab.rute_trayek.index',[
            'title' => 'Rute Trayek Kendaraan'
        ]);
    }
}
