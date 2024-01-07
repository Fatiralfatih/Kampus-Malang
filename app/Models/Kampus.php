<?php

namespace App\Models;

use App\Models\Kontak;
use App\Models\Jurusan;
use App\Models\Fakultas;
use App\Models\GambarKampus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Kampus extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = "kampuses";

    protected $fillable = [
        'nama',
        'slug',
        'milik',
        'tentang',
        'website',
        'alamat',
        'akreditasi',
        'kategori',
        'isFavorit',
        'thumbnail_id',
    ];

    function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        });

        $query->when($filters['cari-jurusan'] ?? false, function ($query, $jurusan) {
            return $query->whereHas('jurusan', function ($query) use ($jurusan) {
                $query->where('nama', $jurusan);
            });
        });
    }

    function Gambar()
    {
        return $this->hasMany(GambarKampus::class, 'kampus_id');
    }

    function Kontak()
    {
        return $this->hasOne(Kontak::class, 'kampus_id');
    }

    function Fakultas()
    {
        return $this->hasMany(Fakultas::class, 'kampus_id');
    }

    function Jurusan(): HasManyThrough
    {
        return $this->hasManyThrough(Jurusan::class, Fakultas::class, 'kampus_id', 'fakultas_id', 'id', 'id');
    }
}
