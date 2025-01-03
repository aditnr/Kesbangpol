<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parpol extends Model
{
    use HasFactory;

    protected $fillable = [
        'partai',
        'ketua',
        'alamat',
        'logo',
    ];
}
