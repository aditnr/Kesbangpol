<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renja extends Model
{
    use HasFactory;
    protected $table = 'renjas';
    protected $fillable = ['nama', 'file', 'tahun'];
}
