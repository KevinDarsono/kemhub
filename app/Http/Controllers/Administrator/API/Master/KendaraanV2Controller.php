<?php

namespace App\Http\Controllers\Administrator\API\Master;

use App\Http\Controllers\CrudController;
use App\Services\Master\KendaraanService;
use Illuminate\Support\Facades\Validator;

class KendaraanV2Controller extends CrudController
{

    public function __construct(KendaraanService $service){
        $this->service = $service;
    }

    public function runValidationShow($request)
    {
        return  Validator::make($request->all(), [
            'id' => 'required|exists:master_kendaraan,id,deleted_at,NULL'
        ]);
    }

}
