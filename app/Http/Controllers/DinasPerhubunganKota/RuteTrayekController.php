<?php

namespace App\Http\Controllers\DinasPerhubunganKota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuteTrayekController extends Controller
{
    public function index(Request $term) {
        return view('dishub_kota.rute_trayek.index',[
            'title' => 'Rute Trayek Kendaraan'
        ]);
    }
}
