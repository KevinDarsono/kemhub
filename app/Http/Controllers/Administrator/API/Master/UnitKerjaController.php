<?php

namespace App\Http\Controllers\Administrator\API\Master;

use App\Http\Controllers\CrudController;
use App\Services\Master\UnitKerjaService;
use Illuminate\Support\Facades\Validator;

class UnitKerjaController extends CrudController
{

    public function __construct(UnitKerjaService $service){
        $this->service = $service;
    }

    public function runValidationShow($request)
    {
        return  Validator::make($request->all(), [
            'id' => 'required|exists:unit_kerja,id,deleted_at,NULL'
        ]);
    }


}
