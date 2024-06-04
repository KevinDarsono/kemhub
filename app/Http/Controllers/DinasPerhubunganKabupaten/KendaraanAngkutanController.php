<?php

namespace App\Http\Controllers\DinasPerhubunganKabupaten;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KendaraanAngkutanController extends Controller
{
    public function index(Request $term) {
        return view('dishub_kab.kendaraan_angkutan.index',[
            'title'     => 'Kendaraan Angkutan'
        ]);
    }
}
