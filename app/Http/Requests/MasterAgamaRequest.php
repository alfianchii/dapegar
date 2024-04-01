<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasterAgamaRequest extends FormRequest
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
            "nama_agama" => ["required", "string", "max:255", "unique:mst_agama,nama_agama"],
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
            "nama_agama.required" => "Nama agama wajib diisi.",
            "nama_agama.string" => "Nama agama harus berupa string.",
            "nama_agama.max" => "Nama agama maksimal 255 karakter.",
            "nama_agama.unique" => "Nama agama sudah terdaftar.",
        ];
    }
}