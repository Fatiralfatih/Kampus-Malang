<?php

namespace App\Action;

class UpdateKontak
{

    function execute($kampus, $request)
    {
        $kampus->Kontak()->update([
            'email' => $request->email,
            'telepon' => $request->telepon,
            'whatsapp' => $request->whatsapp
        ]);
    }
}
