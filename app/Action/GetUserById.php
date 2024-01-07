<?php

namespace App\Action;

use App\Models\User;

class GetUserById
{

    function execute($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return $user;
    }
}
