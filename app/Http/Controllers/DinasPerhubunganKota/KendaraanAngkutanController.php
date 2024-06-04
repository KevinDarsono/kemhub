<?php

namespace App\Http\Controllers\DinasPerhubunganKota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KendaraanAngkutanController extends Controller
{
    public function index(Request $term) {
        return view('dishub_kota.kendaraan_angkutan.index',[
            'title'     => 'Kendaraan Angkutan'
        ]);
    }
}
