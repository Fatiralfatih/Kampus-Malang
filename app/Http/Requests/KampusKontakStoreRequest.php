<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KampusKontakStoreRequest extends FormRequest
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
            'telepon' => 'required|max:20|min:11|unique:kontaks,telepon',
            'email' => 'required|email|unique:kontaks,email',
            'whatsapp' => 'required|min:11|max:20|unique:kontaks,whatsapp'
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
