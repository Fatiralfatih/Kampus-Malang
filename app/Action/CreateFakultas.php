<?php

namespace App\Action;

use Illuminate\Support\Str;

class CreateFakultas
{

    public function execute($request, $kampus)
    {
        $slugFakultas = Str::slug($request->namaFakultas . '-' . $request->namaKampus, '-');
        return $kampus->Fakultas()->create([
            'nama' => $request->namaFakultas,
            'slug' => $slugFakultas,
            'tentang' => $request->tentangFakultas,
            'status' => $request->statusFakultas
        ]);
    }
};
