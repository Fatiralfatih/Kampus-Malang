<?php

namespace App\Action;

use App\Models\User;

class GetRoleMemberUser
{
    function execute() {
        $user = User::where('role', 'member')->get();
        return $user;
    }
}
