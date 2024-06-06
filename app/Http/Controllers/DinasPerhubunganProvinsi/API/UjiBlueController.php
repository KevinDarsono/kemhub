<?php

namespace App\Http\Controllers\DinasPerhubunganProvinsi\API;

use App\Services\DishubProv\UjiBlueService;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Administrator\API\UjiBlueController as AdminUjiBlueController;
use Illuminate\Support\Facades\Auth;

class UjiBlueController extends AdminUjiBlueController
{

    public function __construct(UjiBlueService $service){
        $this->service = $service;
    }

    public function runValidationShow($request)
    {
        return  Validator::make($request->all(), [
            'id' => 'required|exists:uji_blue,id,deleted_at,NULL,provinsi_id,'.Auth::user()->provinsi_id
        ]);
    }

    public function runValidationShowByIdBlue($request)
    {
        return  Validator::make($request->all(), [
            'id_uji_blue' => 'required|exists:uji_blue,id,deleted_at,NULL,provinsi_id,'.Auth::user()->provinsi_id
        ]);
    }

}
