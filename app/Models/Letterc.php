<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letterc extends Model
{
    use HasFactory;

    protected $table = 'lettercs'; // nama tabel di database, biasanya jamak (pakai "s")

    protected $fillable = [
        'nomor_letterc',
        'nomor_persil',
        'nama_pemilik',
        'luas',
        'kelas_desa',
        'jenis_tanah',
    ];
}
