<?php

namespace App\Http\Controllers\Administrator\Trayek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index(Request $term) {
        return view('administrator.trayek.kendaraan.list',[
            'title'     => 'Trayek Kendaraan'
        ]);
    }
}
