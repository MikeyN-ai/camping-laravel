<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName . " " . $this->faker->lastName,
            'correo' => $this->faker->email,
            'nif' => $this->faker->dni,
            'telefono' => $this->faker->phoneNumber,
            'id_camping' => 1,
            'matricula' => $this->faker->regexify('[0-9]{4}[BCDFGHJKLMNPQRSTVWXYZ]{3}'),
        ];
    }
}
