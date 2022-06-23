<?php

namespace Tests\Feature\Annonces;

use App\Models\VirtualTour;
use Illuminate\Http\File;
use Tests\TestCase;

class CreateOrModifyVirtualTourTest extends TestCase
{

    public function test_can_create_virtualTour()
    {
        $virtualTour = VirtualTour::factory()->create();
        $pictures = new File('C:/Users/Naashw/Downloads/IMG_20210606_145701_00_merged.jpg');

        $request = [
            'name' => $virtualTour->name,
            'code' => $virtualTour->code,
            'pictures' => $pictures,
        ];

        $response = $this->post('/api/virtualTour', $request);

        $response->assertOk();

        $this->assertDatabaseHas('virtual_tours', [
            'name' => $virtualTour->name,
            'code' => $virtualTour->code,
        ]);

    }

}
