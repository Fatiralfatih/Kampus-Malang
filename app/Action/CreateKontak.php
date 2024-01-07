<?php

namespace App\action;

class CreateKontak
{

    public function execute($request, $kampus)
    {
        return $kampus->Kontak()->create([
            'email' => $request->email,
            'telepon' => $request->telepon,
            'whatsapp' => $request->whatsapp,
        ]);
    }
}
