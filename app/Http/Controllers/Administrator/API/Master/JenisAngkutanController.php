<?php

namespace App\Http\Controllers\Administrator\API\Master;

use App\Constants\HttpStatusCodes;
use App\Http\Controllers\CrudController;
use App\Services\Master\JenisAngkutanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisAngkutanController extends CrudController
{
    public function __construct(JenisAngkutanService $service){
        $this->service = $service;
    }
    protected function generateMessage($data, $type = null)
    {
        $title = "Jenis Angkutan";
        return $this->generateMessagev2($title, $type);
    }

    public function runValidationShow($request)
    {
        return  Validator::make($request->all(), [
            'id' => 'required|exists:jenis_angkutan,id,deleted_at,NULL'
        ]);
    }

    public function runValidationCreate($request)
    {
        return  Validator::make($request->all(), [
            'nama' => 'required|string|unique:jenis_angkutan,nama,NULL,id,deleted_at,NULL',
            'keterangan' => 'nullable|string|max:50',
        ]);
    }

    public function runValidationUpdate($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:jenis_angkutan,id,deleted_at,NULL',
            'nama' => 'required|string|unique:jenis_angkutan,nama,'.$request->id.',id,deleted_at,NULL',
            'keterangan' => 'nullable|string|max:50',
        ]);
    }

    public function runValidationDestroy($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:jenis_angkutan,id,deleted_at,NULL'
        ]);
    }


}
