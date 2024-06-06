<?php

namespace App\Services\DishubProv;

use App\Models\ApprovalFlow;
use App\Models\ApprovalFlowConfig;
use App\Models\UjiBlue;
use Illuminate\Support\Facades\Auth;
use App\Services\UjiBlueService as AdminUjiBlueService;

class UjiBlueService extends AdminUjiBlueService
{

    public function getModel(){
        return UjiBlue::where('provinsi_id', Auth::user()->provinsi_id);
    }

}
