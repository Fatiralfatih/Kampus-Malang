<?php

namespace App\Http\Requests;

use App\Models\Fakultas;
use App\Models\Jurusan;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class JurusanStoreRequest extends FormRequest
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
        $fakultas = Fakultas::where('slug', $this->fakultasSlug)->pluck('id')->toArray();
        return [
            // jurusan table
            'nama' => [
                'required',
                'max:255',
                Rule::unique('jurusans', 'nama')->where('fakultas_id', $fakultas),
            ],
            'statusJurusan' => ['required', Rule::in([0, 1])],

            // fakultas return slug
            'fakultasSlug' => [
                'required',
                'exists:fakultas,slug',
            ],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        $fakultas = Fakultas::where('slug', $this->fakultasSlug)->get();
        if ($fakultas) {
            foreach ($fakultas as $data) {
                return [
                    'nama' => $data->nama,
                ];
            }
        }

        return [
            'nama' => 'nama Jurusan',
            'fakultasSlug' => 'nama fakultas',
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
            'unique' => 'Jurusan Ini sudah dipakai di fakultas :attribute',
        ];
    }
}
