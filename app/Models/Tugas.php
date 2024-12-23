<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    // Menambahkan kolom tugas dan fungsi ke dalam $fillable
    protected $fillable = ['tugas', 'fungsi', /* kolom lainnya */];
}
