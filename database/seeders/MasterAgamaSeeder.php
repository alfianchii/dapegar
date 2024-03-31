<?php

namespace Database\Seeders;

use App\Models\MasterAgama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterAgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterAgama::insert([
            ["nama_agama" => "Islam", "created_at" => now()],
            ["nama_agama" => "Kristen Protestan", "created_at" => now()],
            ["nama_agama" => "Kristen Katolik", "created_at" => now()],
            ["nama_agama" => "Budha", "created_at" => now()],
            ["nama_agama" => "Hindu", "created_at" => now()],
            ["nama_agama" => "Konghucu", "created_at" => now()],
        ]);
    }
}