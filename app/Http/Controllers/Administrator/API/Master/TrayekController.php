<?php

namespace App\Http\Controllers\Administrator\API\Master;

use App\Http\Controllers\CrudController;
use App\Services\Master\TrayekService;
use Illuminate\Support\Facades\Validator;

class TrayekController extends CrudController
{

    public function __construct(TrayekService $service){
        $this->service = $service;
    }

    public function runValidationShow($request)
    {
        return  Validator::make($request->all(), [
            'id' => 'required|exists:trayek,id,deleted_at,NULL'
        ]);
    }

    protected function generateMessage($data, $type = null)
    {
        $title = "Trayek";
        return $this->generateMessagev2($title, $type);
    }

    public function runValidationCreate($request)
    {
        return  Validator::make($request->all(), [
            'nama' => 'required|string|unique:trayek,nama,NULL,id,deleted_at,NULL',
            'kode' => 'required|string|unique:trayek,kode,NULL,id,deleted_at,NULL',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'keterangan' => 'nullable|string|max:50',
        ]);
    }

    public function runValidationUpdate($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:trayek,id,deleted_at,NULL',
            'nama' => 'required|string|unique:trayek,nama,'.$request->id.',id,deleted_at,NULL',
            'kode' => 'required|string|unique:trayek,kode,'.$request->id.',id,deleted_at,NULL',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'keterangan' => 'nullable|string|max:50',
        ]);
    }

    public function runValidationDestroy($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:trayek,id,deleted_at,NULL'
        ]);
    }

}
