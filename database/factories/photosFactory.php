<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\photos>
 */
class photosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = \App\Models\photos::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'photos' => json_encode($this->faker->imageUrl()),
        ];
    }
}
