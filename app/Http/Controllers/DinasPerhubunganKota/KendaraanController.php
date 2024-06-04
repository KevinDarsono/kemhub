<?php

namespace App\Http\Controllers\DinasPerhubunganKota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index(Request $term) {
        return view('dishub_kota.kendaraan.index',[
            'title'     => 'Daftar Perusahaan'
        ]);
    }

    public function create(Request $term) {
        return view('dishub_kota.kendaraan',[
            'title'     => 'Input Data Perusahaan'
        ]);
    }

    public function show(Request $term, $id) {
        return view('dishub_kota.kendaraan',[
            'title'     => 'Detail Data Perusahaan'
        ]);
    }

    public function edit(Request $term, $id) {
        return view('dishub_kota.kendaraan',[
            'title'     => 'Ubah Data Perusahaan'
        ]);
    }

}
