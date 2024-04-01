<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasterUnitKerjaRequest extends FormRequest
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
      "nama_unit_kerja" => ["required", "unique:mst_unit_kerja,nama_unit_kerja"],
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
      "nama_unit_kerja.required" => "Nama Unit Kerja harus diisi",
      "nama_unit_kerja.unique" => "Nama Unit Kerja sudah ada",
    ];
  }
}