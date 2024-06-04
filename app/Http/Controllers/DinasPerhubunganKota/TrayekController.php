<?php

namespace App\Http\Controllers\DinasPerhubunganKota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrayekController extends Controller
{
    public function index(Request $term) {
        return view('dishub_kota.trayek.index',[
            'title'     => 'Trayek'
        ]);
    }
}
