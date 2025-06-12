<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    use HasFactory;

    protected $table = 'tb_pemilik';
    protected $primaryKey = 'id_pemilik';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'nama_pemilik',
        'luas',
        'nomor_letterc',
        'keterangan',
    ];

    public function pemetaan()
    {
        return $this->belongsToMany(Pemetaan::class, 'tb_pemilik_tanah', 'id_pemilik', 'id_pemetaan')->withTimestamps();
    }
}
