<?php

namespace App\Action;

use App\Models\Jurusan;
use App\Models\Kampus;

class RestoreKampusById
{

    function execute($kampus)
    {
        $kontak = $kampus->Kontak()->withTrashed()->get();
        $gambar = $kampus->Gambar()->withTrashed()->get();
        $fakultas = $kampus->Fakultas()->withTrashed()->get();

        $kampus->restore();
        if ($gambar) {
            $kampus->Gambar()->withTrashed()->restore();
        }
        // restore kontak
        if ($kontak) {
            $kampus->Kontak()->withTrashed()->restore();
        }
        if ($fakultas) {
            // restore fakultas
            $kampus->Fakultas()->withTrashed()->restore();
            // restore jurusan
            $fakultases = $kampus->Fakultas()->withTrashed()->get();
            if ($fakultases) {
                foreach ($fakultases as $fakultas) {
                    Jurusan::where('fakultas_id', $fakultas->id)->onlyTrashed()->restore();
                }
            }
        }

        return $kampus;
    }
}
