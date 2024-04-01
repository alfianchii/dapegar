<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasterJabatanRequest extends FormRequest
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
      "nama_jabatan" => ["required", "string", "max:255", "unique:mst_jabatan,nama_jabatan"],
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
      "nama_jabatan.required" => "Nama jabatan wajib diisi.",
      "nama_jabatan.string" => "Nama jabatan harus berupa string.",
      "nama_jabatan.max" => "Nama jabatan maksimal :max karakter.",
      "nama_jabatan.unique" => "Nama jabatan sudah terdaftar.",
    ];
  }
}
