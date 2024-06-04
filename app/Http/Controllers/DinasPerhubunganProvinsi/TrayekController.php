<?php

namespace App\Http\Controllers\DinasPerhubunganProvinsi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrayekController extends Controller
{
    public function index(Request $term) {
        return view('dishub_provinsi.trayek.index',[
            'title'     => 'Trayek'
        ]);
    }
}
