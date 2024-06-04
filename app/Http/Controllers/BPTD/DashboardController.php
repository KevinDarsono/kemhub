<?php

namespace App\Http\Controllers\BPTD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $term) {
        return view('bptd.dashboard',[
            'title'     => 'Dashboard'
        ]);
    }
    // end class
}
