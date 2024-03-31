<?php

namespace Database\Seeders;

use App\Models\MasterJabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterJabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterJabatan::insert([
            [
                "id_jabatan" => 1,
                "nama_jabatan" => "KEPALA BIDANG PENGEMBANGAN",
                "created_at" => now(),
            ],
            [
                "id_jabatan" => 2,
                "nama_jabatan" => "KEPALA BIDANG PENANAMAN MODAL",
                "created_at" => now(),
            ],
            [
                "id_jabatan" => 3,
                "nama_jabatan" => "KEPALA BIDANG PENGADUAN DAN KOMUNIKASI MASYARAKAT",
                "created_at" => now(),
            ],
            [
                "id_jabatan" => 4,
                "nama_jabatan" => "KEPALA BIDANG KETATARUANGAN, KAJIAN LINGKUNGAN DAN PEMBANGUNAN",
                "created_at" => now(),
            ],
            [
                "id_jabatan" => 5,
                "nama_jabatan" => "KEPALA BIDANG AKTIVITAS USAHA",
                "created_at" => now(),
            ],
            [
                "id_jabatan" => 6,
                "nama_jabatan" => "KEPALA UNIT PELAKSANA PELAYANAN TERPADU SATU PINTU KOTA ADMINISTRASI",
                "created_at" => now(),
            ],
            [
                "id_jabatan" => 7,
                "nama_jabatan" => "KEPALA PUSAT SISTEM TEKNOLOGI INFORMASI DAN KEARSIPAN",
                "created_at" => now(),
            ],
            [
                "id_jabatan" => 8,
                "nama_jabatan" => "KEPALA PUSAT INFORMASI, PROMOSI DAN KERJASAMA INVESTASI",
                "created_at" => now(),
            ],
            [
                "id_jabatan" => 9,
                "nama_jabatan" => "KEPALA BIDANG PELAYANAN I",
                "created_at" => now(),
            ],
            [
                "id_jabatan" => 10,
                "nama_jabatan" => "KEPALA BIDANG PELAYANAN II",
                "created_at" => now(),
            ],
            [
                "id_jabatan" => 11,
                "nama_jabatan" => "KEPALA BIDANG PENYULUHAN DAN PENGADUAN",
                "created_at" => now(),
            ],
            [
                "id_jabatan" => 12,
                "nama_jabatan" => "KEPALA UP JAKARTA INVESTMENT CENTRE",
                "created_at" => now(),
            ],
            [
                "id_jabatan" => 13,
                "nama_jabatan" => "KEPALA PUSAT DATA DAN INFORMASI",
                "created_at" => now(),
            ],
            [
                "id_jabatan" => 14,
                "nama_jabatan" => "KEPALA UP PMPTSP KOTA",
                "created_at" => now(),
            ],
            [
                "id_jabatan" => 15,
                "nama_jabatan" => "KEPALA SUBBAGIAN KEPEGAWAIAN",
                "created_at" => now(),
            ],
        ]);
    }
}
