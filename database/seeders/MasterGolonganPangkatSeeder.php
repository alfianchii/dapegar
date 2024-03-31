<?php

namespace Database\Seeders;

use App\Models\MasterGolonganPangkat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterGolonganPangkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterGolonganPangkat::insert([
            [
                "id_golongan_pangkat" => 1,
                "kode_golongan" => "I",
                "kode_ruang" => "a",
                "nama_pangkat" => "Juru Muda",
                "created_at" => now(),
            ],
            [
                "id_golongan_pangkat" => 2,
                "kode_golongan" => "I",
                "kode_ruang" => "b",
                "nama_pangkat" => "Juru Muda Tingkat I",
                "created_at" => now(),
            ],
            [
                "id_golongan_pangkat" => 3,
                "kode_golongan" => "I",
                "kode_ruang" => "c",
                "nama_pangkat" => "Juru",
                "created_at" => now(),
            ],
            [
                "id_golongan_pangkat" => 4,
                "kode_golongan" => "I",
                "kode_ruang" => "d",
                "nama_pangkat" => "Juru Tingkat I",
                "created_at" => now(),
            ],
            [
                "id_golongan_pangkat" => 5,
                "kode_golongan" => "II",
                "kode_ruang" => "a",
                "nama_pangkat" => "Pengatur Muda",
                "created_at" => now(),
            ],
            [
                "id_golongan_pangkat" => 6,
                "kode_golongan" => "II",
                "kode_ruang" => "b",
                "nama_pangkat" => "Pengatur Muda Tingkat I",
                "created_at" => now(),
            ],
            [
                "id_golongan_pangkat" => 7,
                "kode_golongan" => "II",
                "kode_ruang" => "c",
                "nama_pangkat" => "Pengatur",
                "created_at" => now(),
            ],
            [
                "id_golongan_pangkat" => 8,
                "kode_golongan" => "II",
                "kode_ruang" => "d",
                "nama_pangkat" => "Pengatur Tingkat I",
                "created_at" => now(),
            ],
            [
                "id_golongan_pangkat" => 9,
                "kode_golongan" => "III",
                "kode_ruang" => "a",
                "nama_pangkat" => "Penata Muda",
                "created_at" => now(),
            ],
            [
                "id_golongan_pangkat" => 10,
                "kode_golongan" => "III",
                "kode_ruang" => "b",
                "nama_pangkat" => "Penata Muda Tingkat I",
                "created_at" => now(),
            ],
            [
                "id_golongan_pangkat" => 11,
                "kode_golongan" => "III",
                "kode_ruang" => "c",
                "nama_pangkat" => "Penata",
                "created_at" => now(),
            ],
            [
                "id_golongan_pangkat" => 12,
                "kode_golongan" => "III",
                "kode_ruang" => "d",
                "nama_pangkat" => "Penata Tingkat I",
                "created_at" => now(),
            ],
            [
                "id_golongan_pangkat" => 13,
                "kode_golongan" => "IV",
                "kode_ruang" => "a",
                "nama_pangkat" => "Pembina",
                "created_at" => now(),
            ],
            [
                "id_golongan_pangkat" => 14,
                "kode_golongan" => "IV",
                "kode_ruang" => "b",
                "nama_pangkat" => "Pembina Tingkat I",
                "created_at" => now(),
            ],
            [
                "id_golongan_pangkat" => 15,
                "kode_golongan" => "IV",
                "kode_ruang" => "c",
                "nama_pangkat" => "Pembina Utama Muda",
                "created_at" => now(),
            ],
            [
                "id_golongan_pangkat" => 16,
                "kode_golongan" => "IV",
                "kode_ruang" => "d",
                "nama_pangkat" => "Pembina Utama Madya",
                "created_at" => now(),
            ],
            [
                "id_golongan_pangkat" => 17,
                "kode_golongan" => "IV",
                "kode_ruang" => "e",
                "nama_pangkat" => "Pembina Utama",
                "created_at" => now(),
            ],
        ]);
    }
}
