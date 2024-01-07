<?php

namespace App\Action;

class UpdatePembayaran
{

    function execute($pembayaran, $request)
    {
        $pembayaran->update([
            'kategori' => $request->kategori,
            'biaya' => $request->biaya,
        ]);
    }
}
