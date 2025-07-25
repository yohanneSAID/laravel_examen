<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=CHauffeur>
 */
class ChauffeurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nom' => $this->faker->lastName,
            'contact' => $this->faker->phoneNumber,
            'disponibilite' => $this->faker->randomElement(['disponible', 'en mission', 'indisponible']),
        ];
    }
}
