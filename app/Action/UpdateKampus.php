<?php

namespace App\Action;

use Illuminate\Support\Str;

class UpdateKampus
{

    function execute($request, $kampus)
    {
        $slug = Str::slug($request->nama, '-');
        $kampus->update([
            'nama' => $request->nama,
            'slug' => $slug,
            'alamat' => $request->alamat,
            'akreditasi' => $request->akreditasi,
            'tentang' => $request->tentang,
            'website' => $request->website,
            'kategori' => $request->kategori,
        ]);
    }
}
