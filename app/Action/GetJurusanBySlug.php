<?php

namespace App\Action;

use App\Models\Jurusan;

class GetJurusanBySlug
{

    function execute($slug)
    {
        $jurusan = Jurusan::where('slug', $slug)
            ->with(['fakultas.kampus', 'pembayaran', 'pelaksanaan'])
            ->firstOrFail();

        return $jurusan;
    }
}
