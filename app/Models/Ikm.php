<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikm extends Model
{
    use HasFactory;

    protected $table = 'ikms';
    protected $fillable = ['nama', 'file', 'tahun'];
}
