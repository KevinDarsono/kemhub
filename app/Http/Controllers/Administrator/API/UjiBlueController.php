<?php

namespace App\Http\Controllers\Administrator\API;

use App\Constants\HttpStatusCodes;
use App\Http\Controllers\CrudController;
use App\Services\UjiBlueService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UjiBlueController extends CrudController
{
    public function __construct(UjiBlueService $service){
        $this->service = $service;
    }

    public function runValidationShow($request)
    {
        return  Validator::make($request->all(), [
            'id' => 'required|exists:uji_blue,id,deleted_at,NULL'
        ]);
    }

    public function runValidationShowByIdBlue($request)
    {
        return  Validator::make($request->all(), [
            'id_uji_blue' => 'required|exists:uji_blue,id,deleted_at,NULL'
        ]);
    }

    protected function generateMessage($data, $type = null)
    {
        $title = "Uji Blue";
        return $this->generateMessagev2($title, $type);
    }

    public function persetujuan(Request $request){
        $validator = $this->runValidationShowByIdBlue($request);

        if ($validator->fails()) {
            return response()->json([
                'status_code'   => HttpStatusCodes::HTTP_BAD_REQUEST,
                'error'         => true,
                'message'       => $validator->errors()->all()[0]
            ], HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        $data = $this->service->alurPersetujuan($request->id_uji_blue);

        return response()->json([
            'error' => false,
            'message' => 'Successfully',
            'status_code' => HttpStatusCodes::HTTP_OK,
            'data' => $data,
        ], HttpStatusCodes::HTTP_OK);
    }

    public function ajukan(Request $request){
        $validator = $this->runValidationShow($request);

        if ($validator->fails()) {
            return response()->json([
                'status_code'   => HttpStatusCodes::HTTP_BAD_REQUEST,
                'error'         => true,
                'message'       => $validator->errors()->all()[0]
            ], HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        $data = $this->service->ajukanPersetujuan($request->id_uji_blue);

        return response()->json([
            'error' => false,
            'message' => 'Successfully',
            'status_code' => HttpStatusCodes::HTTP_OK,
            'data' => $data,
        ], HttpStatusCodes::HTTP_OK);
    }

}
