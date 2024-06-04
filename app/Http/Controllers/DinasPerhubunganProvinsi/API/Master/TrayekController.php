<?php

namespace App\Http\Controllers\DinasPerhubunganProvinsi\API\Master;

use App\Http\Controllers\CrudController;
use App\Services\DishubProv\Master\TrayekService;

class TrayekController extends CrudController
{
    public function __construct(TrayekService $service){
        $this->service = $service;
    }

}
