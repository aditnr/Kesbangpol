<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $fillable = [
        'nama_pelapor',
        'jenis_kelamin',
        'alamat_pelapor',
        'kontak_pelapor',
        'email',
        'judul_pengaduan',
        'deskripsi_pengaduan',
        'kategori_pengaduan',
        'status_pengaduan',
        'tanggal_pengaduan',
        'tanggal_diproses',
        'tanggal_selesai',
        'petugas_penanganan',
        'dokumen'
    ];
}
