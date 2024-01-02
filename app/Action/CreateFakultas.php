<?php

namespace App\Action;

use Illuminate\Support\Str;

class CreateFakultas
{

    public function execute($request, $kampus)
    {
        $slugFakultas = Str::slug($request->namaFakultas . '-' . $kampus->nama, '-');
        return $kampus->Fakultas()->create([
            'nama' => $request->namaFakultas,
            'slug' => $slugFakultas,
            'tentang' => $request->tentangFakultas,
            'status' => $request->statusFakultas
        ]);
    }
};
