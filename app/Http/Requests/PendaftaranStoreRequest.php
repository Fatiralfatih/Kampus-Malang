<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PendaftaranStoreRequest extends FormRequest
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
            'slugJurusan' => [
                'required',
                'exists:jurusans,slug',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'slugJurusan' => 'nama jurusan',
        ];
    }

    public function messages(): array
    {
        return [
            'jurusan.exists' => 'jurusan tidak valid',
        ];
    }
}
