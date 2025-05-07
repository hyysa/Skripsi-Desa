<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LettercRequest extends Model
{
    use HasFactory;
    protected $table = 'lettercrequest'; // nama tabel di database, biasanya jamak (pakai "s")

    protected $fillable = [
        'nama_pemohon',
        'nohp',
        'an_letterc',
    ];
}
