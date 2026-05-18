<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class CampingRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|max:40|min:3',
            'direccion' => 'required|max:100|min:5',
            'persona_contacto' => 'required|max:100|min:3',
            'telefono_contacto' => 'required|max:20',
            'correo_contacto' => [
                'required',
                'email',
                'max:150',
                Rule::unique('campings', 'correo_contacto')->ignore($this->camping),
            ],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.min' => 'El nombre debe tener almenos 3 carácteres',
            'nombre.max' => 'El nombre debe tener máximo 40 carácteres',
            'direccion.required' => 'La dirección es obligatoria',
            'direccion.min' => 'El nombre debe tener almenos 5 carácteres',
            'direccion.max' => 'El nombre debe tener máximo 100 carácteres',
            'persona_contacto.required' => 'La persona de contacto es obligatoria',
            'persona_contacto.min' => 'La persona de contacto debe tener almenos 3 carácteres',
            'persona_contacto.max' => 'La persona de contacto debe tener máximo 100 carácteres',
            'telefono_contacto.required' => 'El telefono de contacto es obligatorio',
            'telefono_contacto.max' => 'El telefono de contacto debe tener máximo 20 carácteres',
            'correo_contacto.required' => 'El correo de contacto es obligatorio',
            'correo_contacto.min' => 'El correo de contacto debe tener almenos 5 carácteres',
            'correo_contacto.max' => 'El correo de contacto debe tener máximo 100 carácteres',
            'correo_contacto.unique' => 'Ese correo ya está en uso. Prueba con otro',
            'correo_contacto.email' => 'El correo no tiene el formato correcto',
        ];
    }
}
