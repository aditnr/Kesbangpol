<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visi; // Pastikan untuk mengimpor model Visi

class VisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Visi::create([
            'visi' => 'Kesbangpol',
            'misi' => 'Kota Tasikmalaya',
        ]);
    }
}