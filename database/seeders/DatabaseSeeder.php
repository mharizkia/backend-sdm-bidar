<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            JenjangSeeder::class,
            FakultasSeeder::class,
            ProdiSeeder::class,
            KatUnitKerjaSeeder::class,
            JabatanSeeder::class,
            GolonganSeeder::class,
            RolesSeeder::class,
            UserSeeder::class,
            DosenSeeder::class,
            KaryawanSeeder::class,
        ]);
    }
}
