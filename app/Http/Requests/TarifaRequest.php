<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TarifaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'           => 'required|min:2|max:100',
            'tipo'             => ['required', Rule::in(['por_kilovatio', 'por_amperio'])],
            'precio_dia'       => 'nullable|numeric|min:0',
            'precio_kilovatio' => 'nullable|numeric|min:0',
            'kwh_gratuitos'    => 'nullable|numeric|min:0',
            'limite_watts'     => 'required|integer|min:0',
            'limite_amperios'  => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'           => 'El nombre de la tarifa es obligatorio',
            'nombre.min'                => 'El nombre debe tener al menos 2 caracteres',
            'nombre.max'                => 'El nombre debe tener máximo 100 caracteres',
            'tipo.required'             => 'El tipo de tarifa es obligatorio',
            'tipo.in'                   => 'El tipo debe ser "por_kilovatio" o "por_amperio"',
            'precio_dia.numeric'        => 'El precio por día debe ser un valor numérico',
            'precio_dia.min'            => 'El precio por día no puede ser negativo',
            'precio_kilovatio.numeric'  => 'El precio por kilovatio debe ser un valor numérico',
            'precio_kilovatio.min'      => 'El precio por kilovatio no puede ser negativo',
            'kwh_gratuitos.numeric'     => 'Los kWh gratuitos deben ser un valor numérico',
            'kwh_gratuitos.min'         => 'Los kWh gratuitos no pueden ser negativos',
            'limite_watts.required'     => 'El límite de vatios es obligatorio',
            'limite_watts.integer'      => 'El límite de vatios debe ser un número entero',
            'limite_watts.min'          => 'El límite de vatios no puede ser negativo',
            'limite_amperios.required'  => 'El límite de amperios es obligatorio',
            'limite_amperios.integer'   => 'El límite de amperios debe ser un número entero',
            'limite_amperios.min'       => 'El límite de amperios no puede ser negativo',
        ];
    }
}
