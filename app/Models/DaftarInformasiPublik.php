<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarInformasiPublik extends Model
{
    use HasFactory;
    protected $table = 'daftar_informasi_publiks';
    protected $fillable = ['nama', 'file', 'tahun'];
}
