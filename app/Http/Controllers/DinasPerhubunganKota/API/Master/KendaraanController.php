<?php

namespace App\Http\Controllers\DinasPerhubunganKota\API\Master;

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Administrator\API\Master\KendaraanController as MasterAdminKendaraanController;
use App\Services\DishubKota\Master\KendaraanService;

class KendaraanController extends MasterAdminKendaraanController
{

    public function __construct(KendaraanService $service){
        $this->service = $service;
    }

}
