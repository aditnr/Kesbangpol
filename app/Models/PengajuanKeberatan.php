<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanKeberatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nik',
        'nim',
        'perguruan_tinggi',
        'alamat',
        'email',
        'no_hp',
        'pengajuan',
        'dokumen'
    ];
}
