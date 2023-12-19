<?php

namespace App\Http\Requests;

use App\Models\Kampus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FakultasUpdateRequest extends FormRequest
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
            'nama' => [
                'required',
                'max:255',
            ],
            'tentang' => ['required', 'min:10'],
            'status' => ['required', Rule::in([0, 1])]
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'nama' => 'nama fakultas ' . $this->nama,
            'tentang' => 'tentang fakultas',
            'status' => 'status fakultas',
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
            'max' => ':attribute tidak boleh melebihi 255 huruf',
            'nama.unique' => ':attribute Sudah di pakai',
            'tentang.min' => ':attribute minimal :min huruf',
            'required' => ':attribute Tidak boleh kosong',
            'in' => ':attribute tidak valid'
        ];
    }
}
