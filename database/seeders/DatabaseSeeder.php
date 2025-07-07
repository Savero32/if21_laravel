<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\SesiSeeder;
use Database\Seeders\ProdiSeeder;
use Database\Seeders\MataKuliahSeeder;
use Database\Seeders\JadwalSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SesiSeeder::class,
            ProdiSeeder::class,
            MataKuliahSeeder::class,
            JadwalSeeder::class,
        ]);

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
