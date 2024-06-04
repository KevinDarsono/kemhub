<?php

namespace App\Http\Controllers\Administrator\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    public function index(Request $term) {
        return view('administrator.master-data.kota.list',[
            'title'     => 'Master Data Kota'
        ]);
    }
}
