<?php

namespace App\Http\Controllers\Administrator\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index(Request $term) {
        return view('administrator.master-data.provinsi.list',[
            'title'     => 'Master Data Provinsi'
        ]);
    }
}
