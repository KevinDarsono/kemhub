<?php

namespace App\Http\Controllers\Administrator\API\Master;

use App\Http\Controllers\CrudController;
use App\Services\Master\JenisAngkutanService;
use App\Services\Master\JenisLayananService;
use Illuminate\Support\Facades\Validator;

class JenisLayananController extends CrudController
{

    public function __construct(JenisLayananService $service){
        $this->service = $service;
    }

    protected function generateMessage($data, $type = null)
    {
        $title = "Jenis Layanan";
        return $this->generateMessagev2($title, $type);
    }


    public function runValidationShow($request)
    {
        return  Validator::make($request->all(), [
            'id' => 'required|exists:jenis_layanan,id,deleted_at,NULL'
        ]);
    }

    public function runValidationCreate($request)
    {
        return  Validator::make($request->all(), [
            'nama' => 'required|string|unique:jenis_layanan,nama,NULL,id,deleted_at,NULL',
            'keterangan' => 'nullable|string|max:50',
        ]);
    }

    public function runValidationUpdate($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:jenis_layanan,id,deleted_at,NULL',
            'nama' => 'required|string|unique:jenis_layanan,nama,'.$request->id.',id,deleted_at,NULL',
            'keterangan' => 'nullable|string|max:50',
        ]);
    }

    public function runValidationDestroy($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:jenis_layanan,id,deleted_at,NULL'
        ]);
    }


}
