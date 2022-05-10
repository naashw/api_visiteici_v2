<?php

namespace App\Interfaces;

use App\Http\Requests\UpdateUserPublicRequest;

Interface UserPublicRepositoryInterface
{
    public function getUser();
    public function getUserById($id);
    public function storeUserPublic(UpdateUserPublicRequest $request);

}