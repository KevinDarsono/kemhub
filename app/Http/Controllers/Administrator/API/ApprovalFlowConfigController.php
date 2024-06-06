<?php

namespace App\Http\Controllers\Administrator\API;

use App\Constants\HttpStatusCodes;
use App\Constants\Roles;
use App\Http\Controllers\CrudController;
use App\Models\User;
use App\Services\ApprovalFlowConfigService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApprovalFlowConfigController extends CrudController
{
    public function __construct(ApprovalFlowConfigService $service){
        $this->service = $service;
    }
    protected function generateMessage($data, $type = null)
    {
        $title = "Konfigurasi Alur Persetujuan";
        return $this->generateMessagev2($title, $type);
    }

    public function runValidationShow($request)
    {
        return  Validator::make($request->all(), [
            'id' => 'required|exists:approval_flow_config,id,deleted_at,NULL'
        ]);
    }

    public function runValidationCreate($request)
    {
        return Validator::make($request->all(), [
            // 'user_id' => ['required',
            // function($attribute, $value, $fail) use ($request) {
            //     $user = User::where('id', $value)->first();
            //     if ($user) {
            //         $roles = [
            //             Roles::DINAS_PERHUBUNGAN_PROVINSI,
            //             Roles::DINAS_PERHUBUNGAN_KOTA,
            //             Roles::DINAS_PERHUBUNGAN_KABUPATEN
            //         ];
            //         if(!in_array($user->code_role, $roles)){
            //             $fail('User harus Dishub Provinsi / Kota / Kabupaten');
            //         }
            //     } else {
            //         $fail('User tidak ditemukan');
            //     }
            // }],
            'provinsi_id' => 'required|exists:provinsi,id,deleted_at,NULL',
            'approver_user_id' => [
                'required',
                'array',
                function($attribute, $value, $fail) use ($request) {
                    foreach ($value as $key => $item) {
                        $userApprover = User::where('id', $item)->first();
                        if ($userApprover) {
                            if($userApprover->code_role != Roles::BPTD){
                                $fail('User Approver harus BPTD');
                            }
                            if($request->user_id == $item){
                                $fail('User tidak boleh sama dengan User yang diajukan');
                            }
                            if ($request->provinsi_id != $userApprover->provinsi_id) {
                                $fail('User BPTD tidak boleh dari Provinsi yang berbeda');
                            }
                        } else {
                            $fail('User Approver tidak ditemukan');
                        }
                    }
                }
            ],
        ]);
    }

    public function runValidationUpdate($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:approval_flow_config,id,deleted_at,NULL',
            'user_id' => 'required|exists:users,id,deleted_at,NULL',
            'approver_user_id' => 'required|exists:users,id,deleted_at,NULL',
            'tier' => 'required|integer',
            'is_finish' => 'required|boolean',
        ]);
    }

    public function runValidationDestroy($request)
    {
        return Validator::make($request->all(), [
            // 'id' => 'required|exists:approval_flow_config,id,deleted_at,NULL'
            'provinsi_id' => 'required|exists:approval_flow_config,provinsi_id,deleted_at,NULL'
        ]);
    }

    public function showProvince(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'provinsi_id' => 'required|exists:approval_flow_config,provinsi_id,deleted_at,NULL'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status_code'   => HttpStatusCodes::HTTP_BAD_REQUEST,
                'error'         => true,
                'message'       => $validator->errors()->all()[0]
            ], HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        $data = $this->service->getDetailByProvinceID($request->provinsi_id);

        return response()->json([
            'error' => false,
            'message' => 'Successfully',
            'status_code' => HttpStatusCodes::HTTP_OK,
            'data' => $data,
        ], HttpStatusCodes::HTTP_OK);
    }

    public function destroy(Request $request)
    {
        $validator =  $this->runValidationDestroy($request);

        if ($validator->fails()) {
            return response()->json([
                'status_code'   => HttpStatusCodes::HTTP_BAD_REQUEST,
                'error'         => true,
                'message'       => $validator->errors()->all()[0]
            ], HttpStatusCodes::HTTP_BAD_REQUEST);
        }

        $obj = $this->service->delete($request->provinsi_id);

        return response()->json([
            'error' => false,
            'message' => $this->generateMessage($obj, 'delete'),
            'status_code' => HttpStatusCodes::HTTP_OK,
        ], HttpStatusCodes::HTTP_OK);
    }
}
