<?php

namespace App\Http\Controllers\Administrator\API\Master;

use App\Http\Controllers\CrudController;
use App\Services\Master\RuteTrayekService;
use Illuminate\Support\Facades\Validator;

class RuteTrayekController extends CrudController
{

    public function __construct(RuteTrayekService $service){
        $this->service = $service;
    }

    protected function generateMessage($data, $type = null)
    {
        $title = "Rute Trayek";
        return $this->generateMessagev2($title, $type);
    }

    public function runValidationShow($request)
    {
        return  Validator::make($request->all(), [
            'id' => 'required|exists:rute_trayek,id,deleted_at,NULL'
        ]);
    }

    public function runValidationCreate($request)
    {
        return  Validator::make($request->all(), [
            'nama' => 'required|string|unique:rute_trayek,nama,NULL,id,deleted_at,NULL',
            'trayek_id' => 'required|exists:trayek,id,deleted_at,NULL',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'keterangan' => 'nullable|string|max:50',
        ]);
    }

    public function runValidationUpdate($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:rute_trayek,id,deleted_at,NULL',
            'nama' => 'required|string|unique:rute_trayek,nama,'.$request->id.',id,deleted_at,NULL',
            'trayek_id' => 'required|exists:trayek,id,deleted_at,NULL',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'keterangan' => 'nullable|string|max:50',
        ]);
    }

    public function runValidationDestroy($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:rute_trayek,id,deleted_at,NULL'
        ]);
    }


}
