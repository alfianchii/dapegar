<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasterEselonRequest extends FormRequest
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
      "nama_eselon" => ["required", "string", "max:15", "unique:mst_eselon,nama_eselon"],
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
      "nama_eselon.required" => "Nama eselon wajib diisi.",
      "nama_eselon.string" => "Nama eselon harus berupa string.",
      "nama_eselon.max" => "Nama eselon maksimal :max karakter.",
      "nama_eselon.unique" => "Nama eselon sudah terdaftar.",
    ];
  }
}
