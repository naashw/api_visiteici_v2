<?php

namespace App\Interfaces;

use App\Http\Requests\StoreAppartementRequest;
use App\Models\User;

interface AppartementsRepositoryInterface
{

    public function createAppartement(StoreAppartementRequest $request);
    
}
