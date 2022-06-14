<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VirtualHotSpotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'yaw' => $this->faker->randomFloat(2, -57, 57),
            'pitch' => $this->faker->randomFloat(2, -180, 180),
        ];
    }
}
