<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IdiomaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'idioma' => [
                'required',
                'min:2',
                'max:20',
                Rule::unique('idiomas', 'idioma')
                    ->ignore($this->route('idioma')),
            ],

            'abreviatura' => [
                'required',
                'min:2',
                'max:4',
                Rule::unique('idiomas', 'abreviatura')
                    ->ignore($this->route('idioma')),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'idioma.required' => 'El idioma es obligatorio',
            'idioma.min' => 'El idioma debe tener al menos 2 caracteres',
            'idioma.max' => 'El idioma debe tener máximo 20 caracteres',
            'idioma.unique' => 'Ese idioma ya está registrado',
            'abreviatura.required' => 'La abreviatura es obligatoria',
            'abreviatura.min' => 'La abreviatura debe tener al menos 2 caracteres',
            'abreviatura.max' => 'La abreviatura debe tener máximo 4 caracteres',
            'abreviatura.unique' => 'Esa abreviatura ya está en uso',
        ];
    }
}
