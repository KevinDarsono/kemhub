<?php

namespace App\Http\Controllers\Administrator\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    public function index(Request $term) {
        return view('administrator.master-data.unit-kerja.list',[
            'title'     => 'Master Data Unit Kerja'
        ]);
    }
}
