<?php

namespace App\Http\Controllers\Administrator\API\Master;

use App\Http\Controllers\CrudController;
use App\Services\Master\KotaService;
use Illuminate\Support\Facades\Validator;

class KotaController extends CrudController
{

    public function __construct(KotaService $service){
        $this->service = $service;
    }

    public function runValidationShow($request)
    {
        return  Validator::make($request->all(), [
            'id' => 'required|exists:kota,id,deleted_at,NULL'
        ]);
    }


}
