<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ParcelaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'     => 'required|min:1|max:20',
            'shelly'     => [
                'required',
                'max:20',
                Rule::unique('parcelas', 'shelly')->ignore($this->parcela),
            ],
            'canal'      => 'required|integer|min:0',
            'shelly_on'  => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'     => 'El nombre de la parcela es obligatorio',
            'nombre.min'          => 'El nombre debe tener al menos 1 carácter',
            'nombre.max'          => 'El nombre debe tener máximo 20 caracteres',
            'shelly.required'     => 'El identificador Shelly es obligatorio',
            'shelly.max'          => 'El identificador Shelly debe tener máximo 20 caracteres',
            'shelly.unique'       => 'Ese dispositivo Shelly ya está asignado a otra parcela',
            'canal.required'      => 'El canal es obligatorio',
            'canal.integer'       => 'El canal debe ser un número entero',
            'canal.min'           => 'El canal no puede ser un valor negativo',
            'shelly_on.required'  => 'El estado del Shelly es obligatorio',
            'shelly_on.boolean'   => 'El estado del Shelly debe ser verdadero o falso',
        ];
    }
}
