<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'kontak';
    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'email',
        'instagram',
        'youtube',
        'hari_jam_buka',
        'maps_url',
    ];
}
