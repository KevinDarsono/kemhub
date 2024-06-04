<?php

namespace App\Http\Controllers\Administrator\API;

use App\Constants\Roles;
use App\Http\Controllers\CrudController;
use App\Models\User;
use App\Services\ApprovalFlowConfigService;
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
            'user_id' => ['required',
            function($attribute, $value, $fail) use ($request) {
                $user = User::where('id', $value)->first();
                if ($user) {
                    $roles = [
                        Roles::DINAS_PERHUBUNGAN_PROVINSI,
                        Roles::DINAS_PERHUBUNGAN_KOTA,
                        Roles::DINAS_PERHUBUNGAN_KABUPATEN
                    ];
                    if(!in_array($user->code_role, $roles)){
                        $fail('User harus Dishub Provinsi / Kota / Kabupaten');
                    }
                } else {
                    $fail('User tidak ditemukan');
                }
            }],
            'approver_user_id' => [
                'required',
                'array',
                function($attribute, $value, $fail) use ($request) {
                    foreach ($value as $key => $item) {
                        $userApprover = User::where('id', $item)->first();

                        if ($userApprover) {
                            $user = User::where('id', $request->user_id)->first();

                            if($userApprover->code_role != Roles::BPTD){
                                $fail('User Approver harus BPTD');
                            }
                            if($request->user_id == $item){
                                $fail('User tidak boleh sama dengan User yang diajukan');
                            }
                            if ($user->provinsi_id != $userApprover->provinsi_id) {
                                $fail('User BPTD tidak boleh dari Provinsi yang berbeda');
                            }
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
            'id' => 'required|exists:approval_flow_config,id,deleted_at,NULL'
        ]);
    }

}
