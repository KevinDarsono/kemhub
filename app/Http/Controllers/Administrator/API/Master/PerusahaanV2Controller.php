<?php

namespace App\Http\Controllers\Administrator\API\Master;

use App\Http\Controllers\CrudController;
use App\Services\Master\PerusahaanV2Service;
use Illuminate\Support\Facades\Validator;

class PerusahaanV2Controller extends CrudController
{

    public function __construct(PerusahaanV2Service $service){
        $this->service = $service;
    }

    public function runValidationShow($request)
    {
        return  Validator::make($request->all(), [
            'id' => 'required|exists:perusahaan_v2,id,deleted_at,NULL'
        ]);
    }
}
