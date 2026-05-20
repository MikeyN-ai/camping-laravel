<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckinRequest extends FormRequest
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
            'fecha_entrada' => 'required|date|before_or_equal:fecha_salida',
            'fecha_salida'  => 'required|date|after_or_equal:fecha_entrada',
            'id_parcela'    => 'required|integer|exists:parcelas,id',
            'id_cliente'    => 'required|integer|exists:clientes,id',
            'id_tarifa'     => 'required|integer|exists:tarifas,id',
        ];
    }

    public function messages(): array
    {
        return [
            'fecha_entrada.required'         => 'La fecha de entrada es obligatoria',
            'fecha_entrada.date'             => 'La fecha de entrada no tiene un formato válido',
            'fecha_entrada.before_or_equal'  => 'La fecha de entrada debe ser anterior o igual a la fecha de salida',
            'fecha_salida.required'          => 'La fecha de salida es obligatoria',
            'fecha_salida.date'              => 'La fecha de salida no tiene un formato válido',
            'fecha_salida.after_or_equal'    => 'La fecha de salida debe ser posterior o igual a la fecha de entrada',
            'id_parcela.required'            => 'La parcela es obligatoria',
            'id_parcela.integer'             => 'La parcela debe ser un valor numérico válido',
            'id_parcela.exists'              => 'La parcela seleccionada no existe',
            'id_cliente.required'            => 'El cliente es obligatorio',
            'id_cliente.integer'             => 'El cliente debe ser un valor numérico válido',
            'id_cliente.exists'              => 'El cliente seleccionado no existe',
            'id_tarifa.required'             => 'La tarifa es obligatoria',
            'id_tarifa.integer'              => 'La tarifa debe ser un valor numérico válido',
            'id_tarifa.exists'               => 'La tarifa seleccionada no existe',
        ];
    }
}
