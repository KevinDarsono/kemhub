<?php

namespace App\Http\Controllers\DinasPerhubunganKota\API;

use App\Services\DishubKota\UjiBlueService;
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
            'id' => 'required|exists:uji_blue,id,deleted_at,NULL,kota_id,'.Auth::user()->kota_id
        ]);
    }

    public function runValidationShowByIdBlue($request)
    {
        return  Validator::make($request->all(), [
            'id_uji_blue' => 'required|exists:uji_blue,id,deleted_at,NULL,kota_id,'.Auth::user()->kota_id
        ]);
    }

}
