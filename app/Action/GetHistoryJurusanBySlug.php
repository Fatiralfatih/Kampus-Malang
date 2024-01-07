<?php

namespace App\Action;

use App\Models\Jurusan;

class GetHistoryJurusanBySlug
{
    function execute($slug)
    {
        $jurusan = Jurusan::where('slug', $slug)->onlyTrashed()->firstOrFail();

        return $jurusan;
    }
}
