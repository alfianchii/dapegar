<?php

namespace Database\Seeders;

use App\Models\MasterUnitKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterUnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterUnitKerja::insert([
            [
                "nama_unit_kerja" => "MAL PELAYANAN PUBLIK",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "KABUPATEN KEPULAUAN SERIBU",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "KECAMATAN KEPULAUAN SERIBU UTARA",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "KELURAHAN PULAU PANGGANG",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "KELURAHAN PULAU KELAPA",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "KELURAHAN PULAU HARAPAN",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "KECAMATAN KEPULAUAN SERIBU SELATAN",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "KELURAHAN PULAU UNTUNG JAWA",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "KELURAHAN PULAU TIDUNG",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "KELURAHAN PULAU PARI",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "SEKRETARIAT",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "SUBBAGIAN UMUM",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "SUBBAGIAN KEPEGAWAIAN",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "SUBBAGIAN PROGRAM DAN PELAPORAN",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "SUBBAGIAN KEUANGAN",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "BIDANG PENGEMBANGAN",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "SEKSI REGULASI PELAYANAN TERPADU SATU PINTU",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "SEKSI STANDARISASI DAN INOVASI LAYANAN",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "SEKSI PENGENDALIAN PELAYANAN TERPADU SATU PINTU",
                "created_at" => now(),
            ],
            [
                "nama_unit_kerja" => "BIDANG PENANAMAN MODAL",
                "created_at" => now(),
            ],
        ]);
    }
}