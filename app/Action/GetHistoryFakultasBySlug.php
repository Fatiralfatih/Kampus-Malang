<?php

namespace App\Action;

use App\Models\Fakultas;

class GetHistoryFakultasBySlug
{
    function execute($slug)
    {
        $fakultas = Fakultas::Where('slug', $slug)
                ->withTrashed()
                ->with(['jurusan'])
                ->firstOrFail();

        return $fakultas;
    }
}
