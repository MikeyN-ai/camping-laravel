<?php

namespace Database\Factories;

use App\Models\Checkin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Checkin>
 */
class CheckinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha_entrada' => '2026-05-11 14:30:00',
            'fecha_salida' => '2026-05-13 19:23:00',
            'id_parcela' => 1,
            'id_cliente' => 1,
            'id_tarifa' => 1,
        ];
    }
}
