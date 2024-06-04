<?php

namespace App\Http\Controllers\KementerianPerhubungan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{

    public function index(Request $term) {
        return view('kementerian_perhubungan.perusahaan.index',[
            'title'     => 'Perusahaan'
        ]);
    }
    
    // end class
}
