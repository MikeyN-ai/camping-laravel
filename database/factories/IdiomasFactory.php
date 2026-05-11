<?php

namespace Database\Factories;

use App\Models\Idiomas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Idiomas>
 */
class IdiomasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idioma' => 'Español',
            'abreviatura' => 'ES',
        ];
    }
}
