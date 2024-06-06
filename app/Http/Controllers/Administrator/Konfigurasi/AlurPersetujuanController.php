<?php

namespace App\Http\Controllers\Administrator\Konfigurasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlurPersetujuanController extends Controller
{
    public function index(Request $term) {
        return view('administrator.konfigurasi.alur-persetujuan.list',[
            'title'     => 'Alur Persetujuan'
        ]);
    }
}
