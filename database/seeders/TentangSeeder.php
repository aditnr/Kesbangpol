<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tentang; // Pastikan untuk mengimpor model Tentang

class TentangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tentang::create([
            'judul' => '',
            'deskripsi' => '',
        ]);
    }
}
