<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nip" => ["required", "digits:11", "numeric", "unique:mst_users,nip"],
            "nama_lengkap" => ["required", "max:255"],
            "tempat_lahir" => ["required"],
            "alamat" => ["required"],
            "tanggal_lahir" => ["required", "date"],
            "gender" => ['required', 'in:L,P'],
            "telepon" => ["required", "digits_between:11,13", "starts_with:08", "numeric", "unique:mst_users,telepon"],
            "email" => ["required", "unique:mst_users,email", "email:rfc,dns"],
            "npwp" => ["nullable", "unique:mst_users,npwp"],
            "id_golongan_pangkat" => ["required", "exists:mst_golongan_pangkat,id_golongan_pangkat"],
            "id_eselon" => ["required", "exists:mst_eselon,id_eselon"],
            "id_jabatan" => ["required", "exists:mst_jabatan,id_jabatan"],
            "id_lokasi_kerja" => ["required", "exists:mst_lokasi_kerja,id_lokasi_kerja"],
            "id_unit_kerja" => ["required", "exists:mst_unit_kerja,id_unit_kerja"],
            "id_agama" => ["required", "exists:mst_agama,id_agama"],
            "foto_profil" => ["nullable", "image", "file", "max:5120"],
            "password" => ['required', 'confirmed', 'min:6'],
            "password_confirmation" => ['required', 'min:6', "required_with:password", "same:password"],
            "role" => ["required", 'in:officer'],
        ];
    }

    public function messages(): array
    {
        return [
            "nip.required" => "NIP harus diisi",
            "nip.digits" => "NIP harus berjumlah :digits digit",
            "nip.numeric" => "NIP harus berupa angka",
            "nip.unique" => "NIP sudah terdaftar",
            "nama_lengkap.required" => "Nama lengkap harus diisi",
            "nama_lengkap.max" => "Nama lengkap maksimal :max karakter",
            "tempat_lahir.required" => "Tempat lahir harus diisi",
            "alamat.required" => "Alamat harus diisi",
            "tanggal_lahir.required" => "Tanggal lahir harus diisi",
            "tanggal_lahir.date" => "Tanggal lahir harus berupa tanggal yang valid",
            "gender.required" => "Jenis kelamin harus diisi",
            "gender.in" => "Jenis kelamin tidak valid.",
            "telepon.required" => "Nomor telepon harus diisi.",
            "telepon.digits_between" => "Nomor telepon harus berjumlah antara :min sampai :max digit.",
            "telepon.starts_with" => "Nomor telepon harus diawali dengan 08.",
            "telepon.numeric" => "Nomor telepon harus berupa angka.",
            "telepon.unique" => "Nomor telepon sudah terdaftar.",
            "email.required" => "Email harus diisi.",
            "email.unique" => "Email sudah terdaftar.",
            "email.email" => "Email tidak valid.",
            "npwp.required" => "NPWP harus diisi.",
            "npwp.unique" => "NPWP sudah terdaftar.",
            "id_golongan_pangkat.required" => "Golongan pangkat harus diisi.",
            "id_golongan_pangkat.exists" => "Golongan pangkat tidak valid.",
            "id_eselon.required" => "Eselon harus diisi.",
            "id_eselon.exists" => "Eselon tidak valid.",
            "id_jabatan.required" => "Jabatan harus diisi.",
            "id_jabatan.exists" => "Jabatan tidak valid.",
            "id_lokasi_kerja.required" => "Lokasi kerja harus diisi.",
            "id_lokasi_kerja.exists" => "Lokasi kerja tidak valid.",
            "id_unit_kerja.required" => "Unit kerja harus diisi.",
            "id_unit_kerja.exists" => "Unit kerja tidak valid.",
            "id_agama.required" => "Agama harus diisi.",
            "id_agama.exists" => "Agama tidak valid.",
            "foto_profil.image" => "Foto profil harus berupa gambar.",
            "foto_profil.file" => "Foto profil harus berupa file.",
            "foto_profil.max" => "Foto profil maksimal :max KiB.",
            "password.required" => "Password harus diisi.",
            "password.confirmed" => "Konfirmasi password tidak cocok.",
            "password.min" => "Password minimal :min karakter.",
            "password_confirmation.required" => "Konfirmasi password harus diisi.",
            "password_confirmation.min" => "Konfirmasi password minimal :min karakter.",
            "password_confirmation.required_with" => "Konfirmasi password harus diisi.",
            "password_confirmation.same" => "Konfirmasi password tidak cocok.",
            "role.required" => "Role harus diisi.",
            "role.in" => "Role tidak valid.",
        ];
    }
}
