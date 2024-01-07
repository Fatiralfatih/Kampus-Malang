<?php

namespace App\Action;

use App\Models\Pelaksanaan;

class GetPelaksanaanById
{
    function execute($id)
    {
        $pelaksanaan = Pelaksanaan::where('id', $id)->firstOrFail();

        return $pelaksanaan;
    }
}
