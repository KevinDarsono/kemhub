<?php

namespace App\Http\Controllers\BPTD\Trayek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    public function index(Request $term) {
        return view('bptd.trayek.rute.list',[
            'title'     => 'Rute Trayek'
        ]);
    }
}
