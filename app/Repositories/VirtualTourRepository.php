<?php

namespace App\Repositories;

use App\Http\Requests\StoreVirtualRoomRequest;
use App\Interfaces\VirtualTourRepositoryInterface;
use App\Models\VirtualRoom;
use App\Models\VirtualTour;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VirtualTourRepository implements VirtualTourRepositoryInterface
{

    public function storeVirtualRoom(StoreVirtualRoomRequest $virtualRoom)
    {
        $length = 8;
        $pictures = $virtualRoom['pictures'];

        $name = $virtualRoom['name'];
        $code = $virtualRoom['code'];
        $response = (object) [
            'status' => 200,
            'message' => 'Virtual Room created successfully',
            'name' => $name,
            'code' => $code,
            'pictures' => null,
        ];

        if (!isset($virtualRoom['pictures'])) {

            $response->status = 400;
            $response->message = 'Veuillez ajouter une image';

            return $response;

        }

        if (!empty($name) && !VirtualTour::where([['name', '=', $name], ['code', '=', $code]])->exists()) {

            $response->status = 400;
            $response->message = 'Le code ne correspond pas';

            return $response;
        }

        if (empty($name) || empty($code)) {

            $name = Str::random($length);
            $code = Str::random($length);

            while (VirtualTour::where('name', $name)->exists() || VirtualTour::where('code', $code)->exists()) {
                $name = !VirtualTour::where('name', $name)->exists() ? $name : Str::random($length);
                $code = !VirtualTour::where('code', $code)->exists() ? $code : Str::random($length);
            }

            $response->name = $name;
            $response->code = $code;
        }

        $VirtualTour = VirtualTour::firstOrCreate(
            [
                'name' => $name,
                'code' => $code,
            ],
        );

        $fileUploaded = Storage::disk('public')->put('publicVirtualRoom', $pictures);
        $fileUrl = Storage::url($fileUploaded);

        VirtualRoom::Create(
            [
                'name' => Str::random($length),
                'virtual_tour_id' => $VirtualTour->id,
                'image' => asset($fileUrl),
            ],
        );

        $response->message = 'Visite virtuelle créée avec succès';
        $response->virtualTour = VirtualTour::where([['name', '=', $name]])
            ->with('virtualRoom', 'virtualRoom.virtualHotspot')->first();
        return $response;
    }
}
