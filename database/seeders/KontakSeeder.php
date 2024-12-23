<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kontak;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kontak::create([
            'nama' => '',
            'alamat' => '​',
            'telepon' => '',
            'email' => '',
            'instagram' => '',
            'youtube' => '',
            'hari_jam_buka',
            'maps_embded' => '',
        ]);
    }
}
