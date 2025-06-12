<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemetaan extends Model
{
    use HasFactory;
    protected $table = 'tb_pemetaan';
    protected $primaryKey = 'id_pemetaan';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['blok', 'kelas', 'koordinat', 'persil'];
}
