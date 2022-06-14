<?php

namespace App\Repositories;

use App\Http\Requests\StoreVirtualRoomRequest;
use App\Interfaces\VirtualTourRepositoryInterface;
use App\Models\UserPublic;
use App\Models\VirtualRoom;
use App\Models\VirtualTour;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VirtualTourRepository implements VirtualTourRepositoryInterface
{
   
    function storeVirtualRoom(StoreVirtualRoomRequest $virtualRoom)
    {
       // get pictures from requests
        $pictures = $virtualRoom['pictures'];

        if (isset($pictures)) {

            
            $VirtualTour = VirtualTour::firstOrCreate(
                [
                    'name' => $virtualRoom['name'],
                    'code' => $virtualRoom['code'],
                ],
            );

            $fileUploaded = Storage::disk('public')->put('photo', $pictures);
            $fileUrl = Storage::url($fileUploaded);

            foreach($pictures as $picture) {
                $VirtualRoom = VirtualRoom::Create(
                    [
                        'virtual_tour_id' => $VirtualTour->id,
                        'picture' => asset($fileUrl),
                    ],
                );
            }

        }

   

        return $VirtualTour;
    }
}
