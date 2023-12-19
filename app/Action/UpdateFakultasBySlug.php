<?php

namespace App\Action;

use Illuminate\Support\Str;

class UpdateFakultasBySlug
{
    function execute($request, $fakultas)
    {
        $slug = Str::slug($request->nama . '-' . $fakultas->kampus->nama, '-');
        return $fakultas->update([
            'nama' => $request->nama,
            'slug' => $slug,
            'tentang' => $request->tentang,
            'status' => $request->status,
        ]);
    }
}
