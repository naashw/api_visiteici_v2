<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appartements>
 */
class AppartementsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'categories' => $this->faker->numberBetween(1,2),
            'nom' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'code_postal' => $this->faker->randomNumber(5,false),
            'ville' => $this->faker->city(),
            'adresse' => $this->faker->address(),
            'prix' => $this->faker->randomFloat(2, 100, 10000),
            'charges_comprises' => $this->faker->boolean(),
            'meublé' => $this->faker->boolean(),
            'surface' => $this->faker->randomFloat(2, 9, 300),
            'nb_pieces' => $this->faker->numberBetween(1, 10),
            'nb_chambres' => $this->faker->numberBetween(1, 10),
            'fibre_optique' => $this->faker->boolean(),
            'balcon' => $this->faker->boolean(),
            'terrasse' => $this->faker->boolean(),
            'terasse_surface' => $this->faker->randomFloat(2, 10, 100),
            'cave' => $this->faker->boolean(),
            'jardin' => $this->faker->boolean(),
            'jardin_surface' => $this->faker->randomFloat(2, 50, 1000),
            'parking' => $this->faker->boolean(),
            'garage' => $this->faker->boolean(),
            'ascenseur' => $this->faker->boolean(),
            'classe_energie' => $this->faker->numberBetween(1, 10),
            'GES' => $this->faker->numberBetween(1, 10),
        ];
    }
}
