<?php

namespace App\Action;

class CreateGambarKampus
{
    function execute($thumbnail, $kampus)
    {   
        return $kampus->Gambar()->create([
            'gambar' => $thumbnail,
        ]);
    }
}
