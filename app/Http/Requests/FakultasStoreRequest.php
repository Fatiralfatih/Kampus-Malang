<?php

namespace App\Http\Requests;

use App\Models\Kampus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FakultasStoreRequest extends FormRequest
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
        $kampus = Kampus::where('slug', $this->kampusSlug)->pluck('id')->toArray();
        return [
            'namaFakultas' => [
                'required',
                'max:255',
                Rule::unique('fakultas', 'nama')->where('kampus_id', $kampus),
            ],
            'tentangFakultas' => 'required|min:10',
            'statusFakultas' => ['required', Rule::in([0, 1])]
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
            'namaFakultas' => 'nama fakultas ' . $this->namaFakultas,
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
