<?php

namespace App\Action;

class CreateThumbnailKampus
{

    function execute($kampus, $thumbnail)
    {
        $kampus->update([
            'thumbnail_id' => $thumbnail,
        ]);
    }
}
