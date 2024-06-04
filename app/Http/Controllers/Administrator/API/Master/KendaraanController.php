<?php

namespace App\Http\Controllers\Administrator\API\Master;

use App\Http\Controllers\CrudController;
use App\Services\Master\KendaraanService;
use Illuminate\Support\Facades\Validator;

class KendaraanController extends CrudController
{

    public function __construct(KendaraanService $service){
        $this->service = $service;
    }

    protected function generateMessage($data, $type = null)
    {
        $title = "Kendaraan";
        return $this->generateMessagev2($title, $type);
    }

    public function runValidationShow($request)
    {
        return  Validator::make($request->all(), [
            'id' => 'required|exists:kendaraan,id,deleted_at,NULL'
        ]);
    }

    public function runValidationCreate($request)
    {
        return  Validator::make($request->all(), [
            'nomor_kendaraan' => 'required|string|unique:kendaraan,nomor_kendaraan,NULL,id,deleted_at,NULL',
            'provinsi_id' => 'required|exists:provinsi,id,deleted_at,NULL',
            'kota_id' => 'required|exists:kota,id,deleted_at,NULL',
            'seat' => 'required|integer',
            'merek' => 'required|string',
            'nomor_rangka' => 'required|string|unique:kendaraan,nomor_rangka,NULL,id,deleted_at,NULL',
            'nomor_mesin' => 'required|string|unique:kendaraan,nomor_mesin,NULL,id,deleted_at,NULL',
        ]);
    }

    public function runValidationUpdate($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:kendaraan,id,deleted_at,NULL',
            'nomor_kendaraan' => 'required|string|unique:kendaraan,nomor_kendaraan,'.$request->id.',id,deleted_at,NULL',
            'provinsi_id' => 'required|exists:provinsi,id,deleted_at,NULL',
            'kota_id' => 'required|exists:kota,id,deleted_at,NULL',
            'seat' => 'required|integer',
            'merek' => 'required|string',
            'nomor_rangka' => 'required|string|unique:kendaraan,nomor_rangka,'.$request->id.',id,deleted_at,NULL',
            'nomor_mesin' => 'required|string|unique:kendaraan,nomor_mesin,'.$request->id.',id,deleted_at,NULL',
        ]);
    }

    public function runValidationDestroy($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:kendaraan,id,deleted_at,NULL'
        ]);
    }


}
