<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemilikTanah extends Model
{
    use HasFactory;

    protected $table = 'tb_pemilik_tanah';

    protected $fillable = [
        'id_pemetaan',
        'id_pemilik',
        'id_user',
    ];

    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'id_pemilik');
    }

    public function pemetaan()
    {
        return $this->belongsTo(Pemetaan::class, 'id_pemetaan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
