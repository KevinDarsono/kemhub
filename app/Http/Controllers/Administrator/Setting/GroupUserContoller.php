<?php

namespace App\Http\Controllers\Administrator\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GroupUser;
use PDO;

class GroupUserContoller extends Controller
{
    public function index(Request $term){
       return view('administrator.setting.group-user.list',[
            'title' => 'pengelola-group-pengguna'
       ]);

    }


}

