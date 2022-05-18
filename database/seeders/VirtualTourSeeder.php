<?php

namespace Database\Seeders;

use App\Models\VirtualRoom;
use App\Models\VirtualTour;
use App\Models\VirtualHotspot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VirtualTourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $VirtualTours = VirtualTour::factory()->count(1)->create();

        foreach ($VirtualTours as $virtualTour) {
            $this->seedVirtualRoom($virtualTour);
        }
    }


    private function seedVirtualRoom(VirtualTour $virtualTour)
    {
        $virtualRooms = VirtualRoom::factory()
            ->count(rand(2, 5))
            ->for($virtualTour)
            ->state([
                'virtual_tour_id' => $virtualTour->id,
            ])
            ->create();


        $this->seedVirtualHotspot($virtualRooms);
    }


    private function seedVirtualHotspot($virtualRooms)
    {
        foreach ($virtualRooms as $k => $virtualRoom) {
            $targetRoom = isset($virtualRooms[$k+1]) ? $virtualRooms[$k+1]->name : $virtualRooms[0]->name;
            VirtualHotspot::factory()
                ->for($virtualRoom)
                ->state([
                    'virtual_room_id' => $virtualRoom->id,
                    'room' => $virtualRoom->name,
                    'target_room' => $targetRoom,
                ])
                ->create();
        }
    }
}
