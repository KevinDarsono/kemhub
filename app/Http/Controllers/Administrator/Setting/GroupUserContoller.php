<?php

namespace App\Http\Controllers\Administrator\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupUserContoller extends Controller
{
    public function index(Request $term){
       return view('administrator.grup-pengguna.list',[
            'title' => 'Grup Pengguna'
       ]);

    }


}

