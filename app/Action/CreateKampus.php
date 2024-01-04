<?php

namespace App\Action;

use App\Models\Kampus;
use Illuminate\Support\Str;

class CreateKampus
{
    public function execute($request)
    {
        $slug = Str::slug($request->namaKampus, '-');
        // create kampus
        $kampus =  Kampus::create([
            'nama' => $request->namaKampus,
            'slug' => $slug,
            'alamat' => $request->alamat,
            'akreditasi' => $request->akreditasi,
            'website' => $request->website,
            'kategori' => $request->kategori,
            'tentang' => $request->tentangKampus,
        ]);
        return $kampus;
    }
};
