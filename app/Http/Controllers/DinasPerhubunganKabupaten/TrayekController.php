<?php

namespace App\Http\Controllers\DinasPerhubunganKabupaten;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrayekController extends Controller
{
    public function index(Request $term) {
        return view('dishub_kab.trayek.index',[
            'title'     => 'Trayek'
        ]);
    }
}
