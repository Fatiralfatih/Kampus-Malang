<?php

namespace App\Action;

use App\Models\Fakultas;
use App\Models\Jurusan;
use Illuminate\Support\Str;

class UpdateJurusanBySlug
{
    function execute($request, $jurusan)
    {
        $fakultas = Fakultas::where('slug', $request->fakultasSlug)->with(['kampus'])->firstOrFail();

        $slug = Str::slug($request->namaJurusan . '-' . $fakultas->kampus->nama, '-');

        return $jurusan->update([
            'fakultas_id' => $fakultas->id,
            'nama' => $request->namaJurusan,
            'slug' => $slug,
            'status' => $request->statusJurusan
        ]);

        
    }
}
