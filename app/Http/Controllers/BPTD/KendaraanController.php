<?php

namespace App\Http\Controllers\BPTD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index(Request $term) {
        return view('bptd.kendaraan.list',[
            'title'     => 'Kendaraan'
        ]);
    }
}
