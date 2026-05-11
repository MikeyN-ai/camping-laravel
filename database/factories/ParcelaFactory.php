<?php

namespace Database\Factories;

use App\Models\Parcela;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Parcela>
 */
class ParcelaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => 'Parcela 1',
            'shelly' => 'shelly-12875',
            'id_camping' => 1,
            'canal' => 0,
            'shelly_on' => false,
        ];
    }
}
