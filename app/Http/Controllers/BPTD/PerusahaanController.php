<?php

namespace App\Http\Controllers\BPTD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index(Request $term) {
        return view('bptd.perusahaan.list',[
            'title'     => 'Perusahaan'
        ]);
    }
}
