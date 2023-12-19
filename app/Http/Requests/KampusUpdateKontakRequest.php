<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KampusUpdateKontakRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'telepon' => 'required|numeric',
            'whatsapp' => 'required|numeric',
        ];
    }

    function attributes(): array
    {
        return [
            'telepon' => 'telepon kampus',
            'email' => 'email kampus',
            'whatsapp' => 'whatsapp kampus',
        ];
    }
}