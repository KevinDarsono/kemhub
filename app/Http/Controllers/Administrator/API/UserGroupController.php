<?php

namespace App\Http\Controllers\Administrator\API;

use App\Http\Controllers\CrudController;
use App\Services\UserGroupService;
use Illuminate\Support\Facades\Validator;

class UserGroupController extends CrudController
{
    public function __construct(UserGroupService $service){
        $this->service = $service;
    }
    protected function generateMessage($data, $type = null)
    {
        $title = "Pengelolaan Grup Pengguna";
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
            'user_id' => 'required|exists:users,id,deleted_at,NULL',
            'parent_user_id' => 'required|array|exists:users,id,deleted_at,NULL',
        ]);
    }

    public function runValidationUpdate($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:group_users,id,deleted_at,NULL',
            'user_id' => 'required|exists:users,id,deleted_at,NULL',
            'parent_user_id' => 'required|exists:users,id,deleted_at,NULL',
        ]);
    }

    public function runValidationDestroy($request)
    {
        return Validator::make($request->all(), [
            'id' => 'required|exists:group_users,id,deleted_at,NULL'
        ]);
    }

}
