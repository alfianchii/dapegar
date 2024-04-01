<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasterGolonganPangkatRequest extends FormRequest
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
      "kode_golongan" => ["required", "string", "max:5"],
      "kode_ruang" => ["required", "string", "max:20"],
      "nama_pangkat" => ["required", "string", "max:100", "unique:mst_golongan_pangkat,nama_pangkat"],
    ];
  }

  /**
   * Get the error messages for the defined validation rules.
   *
   * @return array<string, string>
   */
  public function messages(): array
  {
    return [
      "kode_golongan.required" => "Kode golongan wajib diisi.",
      "kode_golongan.string" => "Kode golongan harus berupa string.",
      "kode_golongan.max" => "Kode golongan maksimal :max karakter.",
      "kode_ruang.required" => "Kode ruang wajib diisi.",
      "kode_ruang.string" => "Kode ruang harus berupa string.",
      "kode_ruang.max" => "Kode ruang maksimal :max karakter.",
      "nama_pangkat.required" => "Nama pangkat wajib diisi.",
      "nama_pangkat.string" => "Nama pangkat harus berupa string.",
      "nama_pangkat.max" => "Nama pangkat maksimal :max karakter.",
      "nama_pangkat.unique" => "Nama pangkat sudah terdaftar.",
    ];
  }
}
