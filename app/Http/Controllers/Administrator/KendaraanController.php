<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index(Request $term) {
        return view('administrator.kendaraan.list',[
            'title'     => 'Kendaraan'
        ]);
    }
}
