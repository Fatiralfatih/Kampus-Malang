<?php
namespace App\Action;
use App\Models\GambarKampus;

class GetGambarKampusById{

    function execute($id) {

        $gambar = GambarKampus::where('id', $id)->firstOrFail();

        return $gambar;
    }

}