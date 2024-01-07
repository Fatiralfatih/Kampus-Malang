<?php

namespace App\Action;

class CreateGambarKampus
{
    function execute($kampus, $thumbnail)
    {
        return $kampus->Gambar()->create([
            'gambar' => $thumbnail,
        ]);
    }
}
