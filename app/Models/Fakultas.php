<?php

namespace App\Models;

use App\Models\Kampus;
use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fakultas extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'fakultas';

    protected $fillable = [
        'kampus_id',
        'nama',
        'slug',
        'tentang',
        'status'
    ];

    function getRouteKeyName() {
        return 'slug';
    }

    function Kampus() {
        return $this->belongsTo(Kampus::class, 'kampus_id');
    }

    function Jurusan() {
        return $this->hasMany(Jurusan::class, 'fakultas_id');
    }

}
