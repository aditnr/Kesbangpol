<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visi extends Model
{
    use HasFactory;

    // Nama tabel yang benar
    protected $table = 'visi';  // Ubah ini sesuai nama tabel yang sebenarnya

    protected $fillable = ['visi', 'misi'];
}
