<?php

namespace Database\Seeders;

use App\Models\MasterLokasiKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterLokasiKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterLokasiKerja::insert([
            [
                "nama_lokasi_kerja" => "DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU",
                "nama_alias" => "BPTSP DKI JAKARTA",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA PTSP KABUPATEN ADMINISTRASI KEPULAUAN SERIBU",
                "nama_alias" => "KANTOR PTSP KABUPATEN KEPULAUAN SERIBU",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA KECAMATAN KEPULAUAN SERIBU UTARA",
                "nama_alias" => "SATLAKKEC KEPULAUAN SERIBU UTARA",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA PTSP KELURAHAN PULAU PANGGANG",
                "nama_alias" => "SATLAKKEL PULAU PANGGANG",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA PTSP KELURAHAN PULAU KELAPA",
                "nama_alias" => "SATLAKKEL PULAU KELAPA",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA PTSP KELURAHAN PULAU HARAPAN",
                "nama_alias" => "SATLAKKEL PULAU HARAPAN",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA KECAMATAN KEPULAUAN SERIBU SELATAN",
                "nama_alias" => "SATLAKKEC KEPULAUAN SERIBU SELATAN",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA PTSP KELURAHAN PULAU UNTUNG JAWA",
                "nama_alias" => "SATLAKKEL PULAU UNTUNG JAWA",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA PTSP KELURAHAN PULAU TIDUNG",
                "nama_alias" => "SATLAKKEL PULAU TIDUNG",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA PTSP KELURAHAN PULAU PARI",
                "nama_alias" => "SATLAKKEL PULAU PARI",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA PTSP KOTA ADMINISTRASI JAKARTA PUSAT",
                "nama_alias" => "KANTOR PTSP KOTA ADMINISTRASI JAKARTA PUSAT",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA PTSP KECAMATAN GAMBIR",
                "nama_alias" => "SATLAKKEC GAMBIR",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA PTSP KELURAHAN GAMBIR",
                "nama_alias" => "SATLAKKEL GAMBIR",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA PTSP KELURAHAN CIDENG",
                "nama_alias" => "SATLAKKEL CIDENG",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA PTSP KELURAHAN PETOJO UTARA",
                "nama_alias" => "SATLAKKEL PETOJO UTARA",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA PTSP KELURAHAN PETOJO SELATAN",
                "nama_alias" => "SATLAKKEL PETOJO SELATAN",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA PTSP KELURAHAN KEBON KELAPA",
                "nama_alias" => "SATLAKKEL KEBON KELAPA",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA PTSP KELURAHAN DURI PULO",
                "nama_alias" => "SATLAKKEL DURI PULO",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA PTSP KECAMATAN SAWAH BESAR",
                "nama_alias" => "SATLAKKEC SAWAH BESAR",
                "created_at" => now(),
            ],
            [
                "nama_lokasi_kerja" => "UNIT PELAKSANA PTSP KELURAHAN PASAR BARU",
                "nama_alias" => "SATLAKKEL PASAR BARU",
                "created_at" => now(),
            ],
        ]);
    }
}