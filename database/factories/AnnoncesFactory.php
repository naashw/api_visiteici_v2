<?php

namespace Database\Factories;

use App\Models\Appartements;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Annonces>
 */
class AnnoncesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'biens_id' => Appartements::factory(),
            'biens_type' => $this->faker->numberBetween(0,4), 
            
        ];
    }
}
