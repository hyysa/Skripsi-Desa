<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    use HasFactory;

    protected $table = 'tb_pemilik';

    protected $fillable = [
        'nama_pemilik',
        'persil',
        'luas',
        'nomor_letterc',
        'keterangan',
    ];
}
