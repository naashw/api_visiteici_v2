<?php

namespace App\Repositories;

use App\Http\Requests\UpdateUserPublicRequest;
use App\Interfaces\UserPublicRepositoryInterface;
use App\Models\UserPublic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserPublicRepository implements UserPublicRepositoryInterface
{
    public function getUser()
    {
        return UserPublic::where('id', Auth::id())->first();
    }
    public function getUserById($id)
    {
        $userPublic = null;
        $state = 'Profil public introuvable';
        $finded = false;

        if (UserPublic::where('user_id', '=', $id)->exists()) {
            $userPublic = UserPublic::where('user_id', '=', $id)->first();
            $state = 'Profil public trouvé';
            $finded = true;
        }

        return response()->json([
            'user' => $userPublic,
            'state' => $state,
            'finded' => $finded,
        ]);
    }

    public function storeUserPublic(UpdateUserPublicRequest $request)
    {

        $fileUrl = null;
        $file = $request['photo_public'];

        if (isset($file)) {

            $fileUploaded = Storage::disk('public')->put('photo', $file);
            $fileUrl = Storage::url($fileUploaded);
            $userPublic = UserPublic::updateOrCreate(
                [
                    'user_id' => Auth::id()
                ],
                [
                    'photo_public' => asset($fileUrl),
                ]
            );
        }

        $userPublic = UserPublic::updateOrCreate(
            [
                'user_id' => Auth::id()
            ],
            [
                'name_public' => $request['name_public'],
                'email_public' => $request['email_public'],
                'telephone_public' => $request['telephone_public'],
                'ville_public' => $request['ville_public'],
                'nom_societe_public' => $request['nom_societe_public'],
                'url_website_societe_public' => $request['url_website_societe_public'],
            ]
        );

        return $userPublic;
    }
}
