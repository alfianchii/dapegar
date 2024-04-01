<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasterLokasiKerjaRequest extends FormRequest
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
      "nama_lokasi_kerja" => ["required", "unique:mst_lokasi_kerja,nama_lokasi_kerja"],
      "nama_alias" => ["required", "unique:mst_lokasi_kerja,nama_alias"],
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
      "nama_lokasi_kerja.required" => "Nama Lokasi Kerja harus diisi",
      "nama_lokasi_kerja.unique" => "Nama Lokasi Kerja sudah ada",
      "nama_alias.required" => "Nama Alias harus diisi",
      "nama_alias.unique" => "Nama Alias sudah ada",
    ];
  }
}
