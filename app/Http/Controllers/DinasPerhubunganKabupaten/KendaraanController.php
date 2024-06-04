<?php

namespace App\Http\Controllers\DinasPerhubunganKabupaten;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index(Request $term) {
        return view('dishub_kab.kendaraan.index',[
            'title'     => 'Daftar Perusahaan'
        ]);
    }

    public function create(Request $term) {
        return view('dishub_kab.kendaraan',[
            'title'     => 'Input Data Perusahaan'
        ]);
    }

    public function show(Request $term, $id) {
        return view('dishub_kab.kendaraan',[
            'title'     => 'Detail Data Perusahaan'
        ]);
    }

    public function edit(Request $term, $id) {
        return view('dishub_kab.kendaraan',[
            'title'     => 'Ubah Data Perusahaan'
        ]);
    }

}
