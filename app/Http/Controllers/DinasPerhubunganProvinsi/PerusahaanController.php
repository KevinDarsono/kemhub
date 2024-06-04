<?php

namespace App\Http\Controllers\DinasPerhubunganProvinsi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index(Request $term) {
        return view('dishub_provinsi.perusahaan.index',[
            'title'     => 'Daftar Perusahaan'
        ]);
    }

    public function create(Request $term) {
        return view('dishub_provinsi.perusahaan',[
            'title'     => 'Input Data Perusahaan'
        ]);
    }

    public function show(Request $term, $id) {
        return view('dishub_provinsi.perusahaan',[
            'title'     => 'Detail Data Perusahaan'
        ]);
    }

    public function edit(Request $term, $id) {
        return view('dishub_provinsi.perusahaan',[
            'title'     => 'Ubah Data Perusahaan'
        ]);
    }

}
