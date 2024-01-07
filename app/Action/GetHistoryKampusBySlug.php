<?php

namespace App\Action;

use App\Models\Kampus;

class GetHistoryKampusBySlug
{
    function execute($slug)
    {
        $kampus = Kampus::where('slug', $slug)
            ->with(['gambar', 'kontak', 'jurusan', 'fakultas'])
            ->onlyTrashed()
            ->firstOrFail();

        return $kampus;
    }
}
