<?php

namespace App\Action;

use App\Models\Fakultas;

class GetFakultasBySlug
{
    function execute($slug)
    {
        $fakultas = Fakultas::where('slug', $slug)->with(['kampus'])->firstOrFail();

        return $fakultas;
    }
}
