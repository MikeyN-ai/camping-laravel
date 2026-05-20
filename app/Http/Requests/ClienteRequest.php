<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'     => 'required|min:2|max:30',
            'apellidos'  => 'required|min:2|max:60',
            'correo'     => [
                'required',
                'email',
                'max:60',
                Rule::unique('clientes', 'correo')->ignore($this->cliente),
            ],
            'nif'        => [
                'required',
                'min:9',
                'max:20',
                Rule::unique('clientes', 'nif')->ignore($this->cliente),
            ],
            'telefono'   => 'required|max:20',
            'matricula'  => 'required|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'      => 'El nombre es obligatorio',
            'nombre.min'           => 'El nombre debe tener al menos 2 caracteres',
            'nombre.max'           => 'El nombre debe tener máximo 30 caracteres',
            'apellidos.required'   => 'Los apellidos son obligatorios',
            'apellidos.min'        => 'Los apellidos deben tener al menos 2 caracteres',
            'apellidos.max'        => 'Los apellidos deben tener máximo 60 caracteres',
            'correo.required'      => 'El correo es obligatorio',
            'correo.email'         => 'El correo no tiene el formato correcto',
            'correo.max'           => 'El correo debe tener máximo 60 caracteres',
            'correo.unique'        => 'Ese correo ya está en uso. Prueba con otro',
            'nif.required'         => 'El NIF es obligatorio',
            'nif.min'              => 'El NIF debe tener al menos 9 caracteres',
            'nif.max'              => 'El NIF debe tener máximo 20 caracteres',
            'nif.unique'           => 'Ese NIF ya está registrado',
            'telefono.required'    => 'El teléfono es obligatorio',
            'telefono.max'         => 'El teléfono debe tener máximo 20 caracteres',
            'matricula.required'   => 'La matrícula es obligatoria',
            'matricula.max'        => 'La matrícula debe tener máximo 20 caracteres',
        ];
    }
}
