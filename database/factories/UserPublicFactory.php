<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserPublicFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = \App\Models\UserPublic::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_public' => $this->faker->name(),
            'email_public' => $this->faker->email(),
            'telephone_public' => $this->faker->phoneNumber(),
            'ville_public' => $this->faker->city(),
            'nom_societe_public' => $this->faker->word(),
            'url_website_societe_public' => $this->faker->url(),
            'photo_public' => $this->faker->imageUrl(360,360,'photo de profil'),
        ];
    }
}
