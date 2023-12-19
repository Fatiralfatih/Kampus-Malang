<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class KampusStoreRequest extends FormRequest
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
            // kampus
            'namaKampus' => 'required|max:255|min:5|unique:kampuses,nama',
            'alamat' => 'required|max:255',
            'akreditasi' => 'required|max:20',
            'tentangKampus' => 'required|min:15',
            'website' => ['required', 'max:255', 'min:3', 'unique:kampuses,website'],
            'kategori' => [
                'required',
                Rule::in([
                    'politeknik', 'swasta', 'negeri', 'sekolah tinggi', 'insitut'
                ])
            ],
            // fakultas
            'namaFakultas' => ['required','max:255'],
            'tentangFakultas' => 'required|min:10',
            'statusFakultas' => ['required', Rule::in([0, 1])],

            // kontak
            'email' => 'required|email|max:255|unique:kontaks,email',
            'telepon' => 'required|numeric|unique:kontaks,telepon',
            'whatsapp' => 'required|numeric|unique:kontaks,whatsapp',
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
            'namaKampus' => 'Nama Kampus',
            'alamat' => 'alamat kampus',
            'akreditasi' => 'akreditasi kampus',
            'tentangKampus' => 'tentang Kampus',
            'website' => 'website Kampus',
            'kategori' => 'kategori kampus',

            // fakultas
            'namaFakultas' => 'nama fakultas',
            'tentangFakultas' => 'tentang fakultas',
            'statusFakultas' => 'status fakultas',

            // kontak
            'email' => 'email kampus',
            'telepon' => 'telepon kampus',
            'whatsapp' => 'whatsapp kampus',
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
            'email' => ':attribute tidak valid',
            'in' => ':attribute tidak sesuai',
            'numeric' => ':attribute harus berupa angka',
        ];
    }
}
