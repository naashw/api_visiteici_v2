<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

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

        $path = Storage::putFile('public/photos', new File('public\storage\photos\0M0zfjDFrSM2N9njvUpEW6zKizea4bApuosY9dot.jpg'), 'public');

        // $fileUploaded = Storage::disk('public')->put('photos',$contents);
        $url = Storage::url($path);
               
        return [
            'photos' => asset($url),
        ];
    }
}
