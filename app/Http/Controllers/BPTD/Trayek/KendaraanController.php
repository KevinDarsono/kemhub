<?php

namespace App\Http\Controllers\BPTD\Trayek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index(Request $term) {
        return view('bptd.trayek.kendaraan.list',[
            'title'     => 'Trayek Kendaraan'
        ]);
    }
}
