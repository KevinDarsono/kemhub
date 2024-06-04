<?php

namespace App\Http\Controllers\BPTD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KendaraanAngkutanController extends Controller
{
    public function index(Request $term) {
        return view('bptd.kendaraan-angkutan.list',[
            'title'     => 'Kendaraan Angkutan'
        ]);
    }
}
