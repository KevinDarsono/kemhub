<?php

namespace App\Services\DishubKota;

use App\Models\UjiBlue;
use Illuminate\Support\Facades\Auth;
use App\Services\UjiBlueService as AdminUjiBlueService;

class UjiBlueService extends AdminUjiBlueService
{

    public function getModel(){
        return UjiBlue::where('kota_id', Auth::user()->kota_id);
    }

}
