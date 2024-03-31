<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                "id_user" => 1,
                "nip" => "12345678901",
                "nama_lengkap" => "Alfian",
                "tempat_lahir" => "Tangerang",
                "alamat" => "Jl. Free Fire Factory, No. 1, Kla Only",
                "tanggal_lahir" => "2001-02-25",
                "gender" => "L",
                "phone" => "082334784621",
                "email" => "alfianganteng@gmail.com",
                "npwp" => "09.254.294.3-407.000",
                "id_golongan_pangkat" => 17,
                "id_eselon" => 3,
                "id_jabatan" => 1,
                "id_lokasi_kerja" => 1,
                "id_unit_kerja" => 1,
                "id_agama" => 1,
                "profile_picture" => null,
                "password" => Hash::make("password"),
                "role" => "superadmin",
                "created_at" => now(),
                "created_by" => "root",
            ],
            [
                "id_user" => 2,
                "nip" => "10987654321",
                "nama_lengkap" => "Ahmad Saugi",
                "tempat_lahir" => "Jakarta",
                "alamat" => "Jl. Buah Melon, No. 22, Warna Merah",
                "tanggal_lahir" => "1999-05-29",
                "gender" => "L",
                "phone" => "082378462134",
                "email" => "saugi@gmail.com",
                "npwp" => "09.251.294.3-407.000",
                "id_golongan_pangkat" => 2,
                "id_eselon" => 5,
                "id_jabatan" => 2,
                "id_lokasi_kerja" => 2,
                "id_unit_kerja" => 2,
                "id_agama" => 1,
                "profile_picture" => null,
                "password" => Hash::make("password"),
                "role" => "officer",
                "created_at" => now(),
                "created_by" => "root",
            ],
            [
                "id_user" => 3,
                "nip" => "18765432109",
                "nama_lengkap" => "Wahyu Amirulloh",
                "tempat_lahir" => "Bogor",
                "alamat" => "Jl. Kegelapan, No. 69, Warna Hitam",
                "tanggal_lahir" => "2002-03-22",
                "gender" => "L",
                "phone" => "082378413462",
                "email" => "wahyu@gmail.com",
                "npwp" => "09.259.294.3-407.000",
                "id_golongan_pangkat" => 3,
                "id_eselon" => 9,
                "id_jabatan" => 3,
                "id_lokasi_kerja" => 3,
                "id_unit_kerja" => 3,
                "id_agama" => 1,
                "profile_picture" => null,
                "password" => Hash::make("password"),
                "role" => "officer",
                "created_at" => now(),
                "created_by" => "root",
            ],
        ]);
    }
}
