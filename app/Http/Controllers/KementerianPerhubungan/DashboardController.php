<?php

namespace App\Http\Controllers\KementerianPerhubungan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $term) {
        return view('kementerian_perhubungan.dashboard',[
            'title'     => 'Dashboard'
        ]);
    }
    
    // end class
}
