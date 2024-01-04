<?php

namespace App\Models;

use App\Models\User;
use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftaran extends Pivot
{
    use HasFactory;

    protected $table = 'pendaftarans';

    function jurusan() {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }

    function mahasiswa() {
        return $this->belongsTo(User::class, 'member_id', 'id');
    }

}
