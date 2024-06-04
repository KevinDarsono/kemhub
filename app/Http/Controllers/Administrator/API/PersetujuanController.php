<?php

namespace App\Http\Controllers\Administrator\API;

use App\Constants\HttpStatusCodes;
use App\Http\Controllers\CrudController;
use App\Services\PersetujuanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersetujuanController extends CrudController
{
    public function __construct(PersetujuanService $service){
        $this->service = $service;
    }

    public function setujui(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:approval_flow,id,is_approve,NULL,deleted_at,NULL',
            'is_approve' => 'required|boolean',
            'catatan' => [
                function ($attribute, $value, $fail) use($request) {
                    if ($request->is_approve == false && empty($request->catatan)) {
                        $fail('Catatan harus diisi');
                    }
                }
            ]
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status_code'   => HttpStatusCodes::HTTP_BAD_REQUEST,
                'error'         => true,
                'message'       => $validator->errors()->all()[0]
            ], HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        $data = $this->service->approve($request);

        return response()->json([
            'error' => false,
            'message' => 'Successfully',
            'status_code' => HttpStatusCodes::HTTP_OK,
            'data' => $data,
        ], HttpStatusCodes::HTTP_OK);

    }
}
