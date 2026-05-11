<?php

namespace Database\Factories;

use App\Models\Tarifa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tarifa>
 */
class TarifaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => '0.70 € / kWh',
            'tipo' => 'por_kilovatio',
            'precio_dia' => null,
            'precio_kilovatio' => 0.70,
            'kwh_gratuitos' => 2,
            'limite_watts' => 4480,
            'limite_amperios' => 12,
            'id_camping' => 1,
        ];
    }
}
