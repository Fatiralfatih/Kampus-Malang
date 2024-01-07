<?php

namespace App\Action;

use App\Models\Kampus;

class GetPaginatedKampus
{

    function execute()
    {
        $kampus = Kampus::select(['id', 'nama', 'alamat', 'kategori', 'slug'])
            ->withCount(['Fakultas', 'jurusan'])
            ->orderBy('kategori', 'desc')
            ->paginate(20);
        return $kampus;
    }
}
