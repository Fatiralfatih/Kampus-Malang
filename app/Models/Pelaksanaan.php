<?php

namespace App\Models;

use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelaksanaan extends Model
{
    use HasFactory;

    protected $table = 'pelaksanaans';

    protected $fillable = [
        'jurusan_id',
        'nama',
        'jadwal'
    ];

     /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


    function Jurusan() {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
