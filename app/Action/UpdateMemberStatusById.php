<?php

namespace App\Action;

use App\Models\User;

class UpdateMemberStatusById
{

    function execute($status, $user)
    {
        return $user->update([
            'status' => $status,
        ]);
    }
}
