<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'tb_berita';
    protected $fillable = [
        'id',
        'nama_author',
        'judul',
        'isi_berita',
        'kategori',
        'dokumentasi',
    ];
}
