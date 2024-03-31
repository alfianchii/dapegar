<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MasterGolonganPangkatSeeder::class,
            MasterEselonSeeder::class,
            MasterJabatanSeeder::class,
            MasterLokasiKerjaSeeder::class,
            MasterUnitKerjaSeeder::class,
            MasterAgamaSeeder::class,
            UserSeeder::class,
        ]);
    }
}
