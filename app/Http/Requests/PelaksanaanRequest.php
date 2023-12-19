<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PelaksanaanRequest extends FormRequest
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
            'nama' => ['required', 'max:255'],
            'jadwal' => ['required', 'date_format:Y-m-d'],
        ];
    }

    function attributes(): array
    {
        return [
            'jadwal' => 'jadwal pelaksanaan',
            'nama' => 'nama jadwal'
        ];
    }

    function messages(): array
    {
        return [
            'date_format' => ':attribute harus format Y-m-d'
        ];
    }
}
