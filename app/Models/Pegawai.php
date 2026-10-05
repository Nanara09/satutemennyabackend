<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'departemen_id',
        'nama_pegawai',
        'email',
        'jabatan',
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }
}