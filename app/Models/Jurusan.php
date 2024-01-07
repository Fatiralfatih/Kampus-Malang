<?php

namespace App\Models;

use App\Models\User;
use App\Models\Fakultas;
use App\Models\Pembayaran;
use App\Models\Pelaksanaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurusan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jurusans';

    protected $fillable = [
        'fakultas_id',
        'nama',
        'slug',
        'status',
    ];

    function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }

    function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'jurusan_id');
    }

    function pelaksanaan()
    {
        return $this->hasMany(Pelaksanaan::class, 'jurusan_id');
    }

    function pendaftaran()
    {
        return $this->belongsToMany(user::class, 'pendaftarans', 'jurusan_id', 'member_id')
            ->withPivot(['id', 'status'])
            ->withTimestamps()
            ->orderByPivot('created_at', 'asc');
    }
}
