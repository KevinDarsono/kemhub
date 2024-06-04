<?php

namespace App\Http\Controllers\DinasPerhubunganProvinsi\API\Master;

use App\Http\Controllers\Administrator\API\Master\KendaraanController as MasterAdminKendaraanController;
use App\Services\DishubProv\Master\KendaraanService;

class KendaraanController extends MasterAdminKendaraanController
{

    public function __construct(KendaraanService $service){
        $this->service = $service;
    }

}
