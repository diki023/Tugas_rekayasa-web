<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'gurus';
    public $timestamps = true;

    protected $fillable = [
        'nama', 'mata_pelajaran', 'pengalaman_tahun'
    ];
}
