<?php

namespace App\Traits;

use App\Models\GroupUser;
use Illuminate\Support\Facades\Auth;

trait UserAssigned
{
    public function getUserAssigned(){
        $userId = Auth::user()->id;
        $groupUser = GroupUser::where('user_id', $userId)->get();
        $usersId = [$userId];
        foreach ($groupUser as $key => $value) {
            dd($value);
            $usersId[] = $value->parent_user_id;
        }

        return $usersId;
    }

}
