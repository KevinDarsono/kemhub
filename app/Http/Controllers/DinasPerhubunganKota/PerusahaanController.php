<?php

namespace App\Http\Controllers\DinasPerhubunganKota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index(Request $term) {
        return view('dishub_kota.perusahaan.index',[
            'title'     => 'Daftar Perusahaan'
        ]);
    }

    public function create(Request $term) {
        return view('dishub_kota.perusahaan',[
            'title'     => 'Input Data Perusahaan'
        ]);
    }

    public function show(Request $term, $id) {
        return view('dishub_kota.perusahaan',[
            'title'     => 'Detail Data Perusahaan'
        ]);
    }

    public function edit(Request $term, $id) {
        return view('dishub_kota.perusahaan',[
            'title'     => 'Ubah Data Perusahaan'
        ]);
    }

}
