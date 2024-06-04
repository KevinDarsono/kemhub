<?php

namespace App\Http\Controllers\DinasPerhubunganKota\API\Master;

use App\Http\Controllers\Administrator\API\Master\PerusahaanController as MasterAdminPerusahaanController;
use App\Services\DishubKota\Master\PerusahaanService;

class PerusahaanController extends MasterAdminPerusahaanController
{

    public function __construct(PerusahaanService $service){
        $this->service = $service;
    }
}
