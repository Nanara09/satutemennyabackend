<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataBuku extends Model
{
    protected $table = 'data_buku';

    protected $fillable = [
        'jenis_buku_id',
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'stok',
    ];

     public function jenisBuku()
    {
        return $this->belongsTo(JenisBuku::class, 'jenis_buku_id');
    }
}
