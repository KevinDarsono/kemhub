<?php

namespace App\Http\Controllers\DinasPerhubunganProvinsi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuteTrayekController extends Controller
{
    public function index(Request $term) {
        return view('dishub_provinsi.rute_trayek.index',[
            'title' => 'Rute Trayek Kendaraan'
        ]);
    }
}
