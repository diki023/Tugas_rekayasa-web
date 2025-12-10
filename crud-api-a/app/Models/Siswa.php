<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    public $timestamps = true;

    protected $fillable = [
        'nama', 'umur', 'alamat'
    ];
}
