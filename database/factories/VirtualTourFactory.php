<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VirtualTour>
 */
class VirtualTourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'name' => $this->faker->unique()->regexify('[a-zA-Z0-9]{6}'),
            'code' => $this->faker->unique()->regexify('[a-zA-Z0-9]{6}'),
        ];

    }
}
