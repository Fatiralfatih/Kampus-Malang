<?php

namespace App\Action;

use Illuminate\Support\Str;

class CreateJurusan
{
    function execute($request, $kampus)
    {
        $slug = Str::slug($request->nama . '-' . $kampus->nama, '-');
        $fakultases = $kampus->Fakultas()->where('slug', $request->fakultasSlug)->select(['id', 'kampus_id'])->get();
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
