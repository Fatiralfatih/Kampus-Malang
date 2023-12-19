<?php

namespace App\Models;

use App\Models\Kampus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kontak extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kontaks';

    protected $fillable = [
        'kampus_id',
        'telepon',
        'email',
        'whatsapp'
    ];

    protected $dates = ['deleted_at'];

    function kampus() {
        return $this->belongsTo(Kampus::class, 'kampus_id');
    }
}
