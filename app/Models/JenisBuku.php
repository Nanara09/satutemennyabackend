<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisBuku extends Model
{
    protected $table = 'jenis_buku';

    protected $fillable = [
        'nama_jenis'
    ];

     public function buku()
    {
        return $this->hasMany(DataBuku::class, 'jenis_buku_id');
    }
}
