<?php

namespace App\Http\Controllers\DinasPerhubunganProvinsi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KendaraanAngkutanController extends Controller
{
    public function index(Request $term) {
        return view('dishub_provinsi.kendaraan_angkutan.index',[
            'title'     => 'Kendaraan Angkutan'
        ]);
    }
}
