<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Vehicule>
 */
class VehiculeFactory extends Factory
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
            'immatriculation' => $this->faker->word(),
            'marque' => $this->faker->word(),
            'modele' => $this->faker->word(),
            'statut' => $this->faker->randomElement(['disponible', 'en mission', 'en reparation']),
        ];
    }
}
