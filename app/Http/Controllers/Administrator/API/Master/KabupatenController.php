<?php

namespace App\Http\Controllers\Administrator\API\Master;

use App\Http\Controllers\CrudController;
use App\Services\Master\KabupatenService;
use Illuminate\Support\Facades\Validator;

class KabupatenController extends CrudController
{

    public function __construct(KabupatenService $service){
        $this->service = $service;
    }

    public function runValidationShow($request)
    {
        return  Validator::make($request->all(), [
            'id' => 'required|exists:kabupaten,id,deleted_at,NULL'
        ]);
    }


}
