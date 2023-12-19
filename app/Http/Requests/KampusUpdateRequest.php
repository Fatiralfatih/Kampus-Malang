<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class KampusUpdateRequest extends FormRequest
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
            'nama' => 'required|max:255|min:5',
            'alamat' => 'required|max:255',
            'akreditasi' => 'required|max:20|min:1',
            'tentang' => 'required|min:15',
            'website' => ['required', 'max:255', 'min:5'],
            'kategori' => [
                'required',
                Rule::in([
                    'politeknik', 'swasta', 'negeri', 'sekolah tinggi', 'insitut'
                ])
            ],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    function attributes(): array
    {
        return [
            // kampus
            'nama' => 'Nama Kampus',
            'alamat' => 'alamat kampus',
            'akreditasi' => 'akreditasi kampus',
            'tentang' => 'tentang Kampus',
            'website' => 'website Kampus',
            'kategori' => 'kategori kampus',
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
            'max' => ':attribute tidak boleh melebihi :max huruf',
            'min' => ':attribute minimal :min huruf',
            'in' => ':attribute tidak sesuai',
        ];
    }
}
