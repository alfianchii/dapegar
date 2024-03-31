<?php

namespace Database\Seeders;

use App\Models\MasterEselon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterEselonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterEselon::insert([
            [
                "id_eselon" => 1,
                "nama_eselon" => "I.A",
                "created_at" => now(),
            ],
            [
                "id_eselon" => 2,
                "nama_eselon" => "I.B",
                "created_at" => now(),
            ],
            [
                "id_eselon" => 3,
                "nama_eselon" => "II.A",
                "created_at" => now(),
            ],
            [
                "id_eselon" => 4,
                "nama_eselon" => "II.B",
                "created_at" => now(),
            ],
            [
                "id_eselon" => 5,
                "nama_eselon" => "III.A",
                "created_at" => now(),
            ],
            [
                "id_eselon" => 6,
                "nama_eselon" => "III.B",
                "created_at" => now(),
            ],
            [
                "id_eselon" => 7,
                "nama_eselon" => "IV.A",
                "created_at" => now(),
            ],
            [
                "id_eselon" => 8,
                "nama_eselon" => "IV.B",
                "created_at" => now(),
            ],
            [
                "id_eselon" => 9,
                "nama_eselon" => "V.A",
                "created_at" => now(),
            ],
        ]);
    }
}
