<?php

namespace App\Action;

use Illuminate\Support\Str;

class CreateJurusan
{
    function execute($kampus, $request)
    {
        $slug = Str::slug($request->nama . '-' . $kampus->nama, '-');
        $fakultases = $kampus->Fakultas()->where('slug', $request->fakultasSlug)->get();
        foreach ($fakultases as $fakultas) {
            $kampus->Jurusan()->create([
                'fakultas_id' => $fakultas->id,
                'nama' => $request->nama,
                'slug' => $slug,
                'status' => $request->statusJurusan,
            ]);
        }
    }
}
