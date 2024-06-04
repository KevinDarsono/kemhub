<?php

namespace App\Http\Controllers\Administrator\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    public function index(Request $term) {
        return view('administrator.master-data.kabupaten.list',[
            'title'     => 'Master Data Kabupaten'
        ]);
    }
}
