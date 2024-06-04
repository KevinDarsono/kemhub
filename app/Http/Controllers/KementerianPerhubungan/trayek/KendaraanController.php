<?php

namespace App\Http\Controllers\KementerianPerhubungan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrayekController extends Controller
{
    public function index(){
        return view('kementerian_perhubungan.trayek.list', [
            'title' => 'Trayek'
        ]);
    }

}
