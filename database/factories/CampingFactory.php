<?php

namespace Database\Factories;

use App\Models\Camping;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Camping>
 */
class CampingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->randomElement([
                'Tamarit Beach Resort',
                'La Marina Camping & Resort',
                'Playa Montroig Camping Resort',
                'Sangulí Salou',
                'Cambrils Park Resort',
                'Vilanova Park',
                'Alannia Costa Blanca',
                'Alannia Guardamar',
                'El Portús Camping',
                'Camping La Siesta',
                'Camping Internacional de Calonge',
                'Camping & Resort Sangulí',
                'Playa Tropicana',
                'Camping Castell Montgrí'
            ]),
            'direccion' => $this->faker->address,
            'persona_contacto' => $this->faker->firstName . " " . $this->faker->lastName . " " . $this->faker->lastName,
            'telefono_contacto' => $this->faker->phoneNumber,
            'correo_contacto' => $this->faker->email,
        ];
    }
}
