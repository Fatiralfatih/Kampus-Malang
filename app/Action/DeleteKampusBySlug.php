<?php

namespace App\Action;

class DeleteKampusBySlug
{
    public function execute($kampus)
    {
        if ($kampus->Kontak()) {
            $kampus->Kontak()->delete();
        }
        if ($kampus->Gambar()) {
            $kampus->Gambar()->delete();
        }
        if ($kampus->Jurusan() || $kampus->Fakultas()) {
            $kampus->Jurusan()->delete();
            $kampus->Fakultas()->delete();
        }
        return $kampus->delete();
    }
}
