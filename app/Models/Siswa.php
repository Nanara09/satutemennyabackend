<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'name', 'no_absen', 'jurusan', 'kelas', ' alamat'
    ];
}
