<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // User::factory(10)->create();

        User::create()->create([
            'username' => 'admin',
            'password' => Hash::make('$2a$12$2P5.hsIQu58jYOMxVIIpRO7LlgZxvMAvgL2kMW88SN.Oy05k7e2Pu'),
        ]);
    }
}
