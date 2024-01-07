<?php

namespace App\Action;

use App\Models\Fakultas;
use Illuminate\Support\Str;

class UpdateJurusan
{
    function execute($request, $jurusan)
    {
        // $fakultas = Fakultas::where('slug', $request->fakultasSlug)
        //     ->with(['kampus'])
        //     ->firstOrFail();

        $fakultas = app(GetFakultasBySlug::class)->execute($request->fakultasSlug);
        
        $slug = Str::slug($request->namaJurusan . '-' . $fakultas->kampus->nama, '-');

        return $jurusan->update([
            'fakultas_id' => $fakultas->id,
            'nama' => $request->namaJurusan,
            'slug' => $slug,
            'status' => $request->statusJurusan
        ]);
    }
}
