<?php

namespace App\Http\Controllers\Administrator\API\Master;

use App\Http\Controllers\CrudController;
use App\Services\Master\ProvinsiService;
use Illuminate\Support\Facades\Validator;

class ProvinsiController extends CrudController
{

    public function __construct(ProvinsiService $service){
        $this->service = $service;
    }

    public function runValidationShow($request)
    {
        return  Validator::make($request->all(), [
            'id' => 'required|exists:provinsi,id,deleted_at,NULL'
        ]);
    }


}
