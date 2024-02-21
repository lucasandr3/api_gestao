<?php

namespace App\Http\Requests\TokenCompany;

use Illuminate\Foundation\Http\FormRequest;

class CreateTokenCompanyRequest extends FormRequest
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
            'document' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'document.required' => 'Informe o Documento do parceiro.'
        ];
    }
}
