<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lkip extends Model
{
    use HasFactory;

    protected $table = 'lkips';
    protected $fillable = ['nama', 'file', 'tahun'];
}
