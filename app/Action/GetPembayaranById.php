<?php

namespace App\Action;

use App\Models\Pembayaran;

class GetPembayaranById
{
    function execute($id)
    {
        $pembayaran = Pembayaran::where('id', $id)->firstOrFail();

        return $pembayaran;
    }
}
