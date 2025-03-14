<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemetaan extends Model
{
    use HasFactory;
    protected $table = 'tb_pemetaan';
    protected $fillable = ['nama_pemilik', 'dusun', 'blok', 'luas', 'kelas', 'koordinat'];
}
