<?php

namespace App\Http\Controllers\Administrator\Trayek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    public function index(Request $term) {
        return view('administrator.trayek.rute.list',[
            'title'     => 'Rute Trayek'
        ]);
    }
}
