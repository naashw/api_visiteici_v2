<?php

namespace App\Interfaces;

use App\Http\Requests\StoreVirtualRoomRequest;

Interface VirtualTourRepositoryInterface
{
    public function storeVirtualRoom(StoreVirtualRoomRequest $virtualRoom);
    

}