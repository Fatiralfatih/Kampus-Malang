<?php

namespace App\Action;

use App\Models\User;

class UpdateMemberStatusById
{

    function execute($status, $id)
    {
        $user = User::where('id', $id)->firstOrFail();

        return $user->update([
            'status' => $status,
        ]);
    }
}
