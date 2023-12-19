<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GambarKampus extends Model
{
    use HasFactory,SoftDeletes;

    protected $model = GambarKampus::class;
    
    protected $table = 'gambar_kampus';

    protected $fillable = [
        'kampus_id',
        'gambar'
    ];
    
    function getRouteKeyName() {
        return 'gambar';
    }

    function Kampus()
    {
        return $this->belongsTo(Kampus::class, 'kampus_id');
    }
}
