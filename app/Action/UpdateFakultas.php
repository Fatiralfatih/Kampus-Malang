<?php

namespace App\Action;

use Illuminate\Support\Str;

class UpdateFakultas
{
    function execute($fakultas, $request)
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
