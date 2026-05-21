<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $usuario = $this->route('usuario'); // sirve para create y edit

        return [
            /*'correo' => [
                'required',
                'email',
                'max:100',
                //Rule::unique('usuarios', 'correo')
                    //->ignore($usuario?->id),
            ],*/

            'correo' => [
                'required',
                'email',
                'max:100',
                Rule::unique('usuarios')
                    ->where(function ($query) {
                        return $query->where('id_camping', $this->id_camping);
                    }),
            ],

            'usuario' => [
                'required',
                'min:3',
                'max:20',
                Rule::unique('usuarios')
                    ->where(function ($query) {
                        return $query->where('id_camping', $this->id_camping);
                    }),
            ],

            /*'usuario' => [
                'required',
                'min:3',
                'max:20',
                // Rule::unique('usuarios', 'usuario')
                // ->ignore($usuario?->id),
            ],*/

            'id_idioma' => 'required|integer|exists:idiomas,id',

            'rol' => ['required', Rule::in(['admin', 'usuario'])],

            // CREATE: obligatorio
            // UPDATE: opcional
            'password' => [
                $this->isMethod('POST') ? 'required' : 'nullable',
                'min:8',
                'max:100',
                'confirmed',
            ],

            'id_camping' => 'required|integer|exists:campings,id',
        ];
    }

    public function messages(): array
    {
        return [
            'correo.required' => 'El correo es obligatorio',
            'correo.email' => 'El correo no tiene formato válido',
            'correo.max' => 'Máximo 100 caracteres',
            'correo.unique' => 'Este correo ya está registrado en este camping',

            'usuario.required' => 'El usuario es obligatorio',
            'usuario.min' => 'Mínimo 3 caracteres',
            'usuario.max' => 'Máximo 20 caracteres',
            'usuario.unique' => 'Este usuario ya existe en este camping',

            'id_idioma.required' => 'El idioma es obligatorio',
            'id_idioma.exists' => 'El idioma no existe',

            'rol.required' => 'El rol es obligatorio',
            'rol.in' => 'Rol inválido',

            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'Mínimo 8 caracteres',
            'password.max' => 'Máximo 100 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ];
    }
}
