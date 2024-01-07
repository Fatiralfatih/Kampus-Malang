<?php

namespace App\Action;

use App\Models\Kampus;

class GetKampusBySlug
{
    function execute($slug)
    {
        $kampus = Kampus::where('slug', $slug)
            ->with(['gambar', 'kontak', 'fakultas', 'jurusan'])
            ->firstOrFail();
        return $kampus;
    }
}
