<?php

namespace Database\Factories;

use App\Models\VirtualRoom;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VirtualRoom>
 */
class VirtualRoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $path = Storage::putFile('public/VirtualRoom', new File('public\storage\virtualRoom\IMG_20210606_145423_00_merged.jpg'), 'public');
        $url = Storage::url($path);
        
        return [
            'name' => $this->faker->word,
            'image' => asset($url),
        ];
    }
}
