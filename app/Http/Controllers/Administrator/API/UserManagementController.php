<?php

namespace App\Http\Controllers\Administrator\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CrudController;
use App\Services\UserManagementService;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends CrudController
{
    public function __construct(UserManagementService $service){
        $this->service = $service;
    }
    protected function generateMessage($data, $type = null)
    {
        $title = "Akun Pengguna";
        return $this->generateMessagev2($title, $type);
    }

    public function runValidationShow($request)
    {
        return  Validator::make($request->all(), [
            'id' => 'required|exists:users,id,deleted_at,NULL'
        ]);
    }

    public function runValidationCreate($request)
    {
        return  Validator::make($request->all(), [
            'code_role' => 'required',
            'unit_kerja_id' => 'nullable|exists:unit_kerja,id,deleted_at,NULL',
            'provinsi_id' => 'nullable|exists:provinsi,id,deleted_at,NULL',
            'kota_id' => 'nullable|exists:kota,id,deleted_at,NULL',
            'kabupaten_id' => 'nullable|exists:kabupaten,id,deleted_at,NULL',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'required|string',
        ]);
    }

    public function runValidationUpdate($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:users,id,deleted_at,NULL',
            'unit_kerja_id' => 'nullable|exists:unit_kerja,id,deleted_at,NULL',
            'provinsi_id' => 'nullable|exists:provinsi,id,deleted_at,NULL',
            'kota_id' => 'nullable|exists:kota,id,deleted_at,NULL',
            'kabupaten_id' => 'nullable|exists:kabupaten,id,deleted_at,NULL',
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'email' => 'nullable|email|unique:users,email,'.$request->id.',id,deleted_at,NULL',
            'password' => 'nullable|string',
        ]);
    }

    public function runValidationDestroy($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:users,id,deleted_at,NULL'
        ]);
    }


}

