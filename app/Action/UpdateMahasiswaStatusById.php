<?php

namespace App\Action;

use App\Models\Jurusan;

class UpdateMahasiswaStatusById
{
    function execute($status, $id)
    {
        $jurusans = Jurusan::with(['pendaftaran' => function ($query) use ($id) {
            $query->wherePivot('id', $id);
        }])->get();

        foreach ($jurusans as $jurusan) {
            foreach ($jurusan->pendaftaran as $pendaftaran) {
                return $pendaftaran->pendaftaran()->wherePivot('id', $id)->updateExistingPivot($jurusan->id, [
                    'status' =>  $status,
                ]);
            }
        }
    }
}
