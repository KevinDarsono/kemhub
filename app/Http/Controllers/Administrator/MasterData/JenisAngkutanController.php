<?php

namespace App\Http\Controllers\Administrator\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JenisAngkutanController extends Controller
{
    public function index(Request $term) {
        return view('administrator.master-data.jenis-angkutan.list',[
            'title'     => 'Master Data Jenis Angkutan'
        ]);
    }
}