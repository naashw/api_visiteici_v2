<?php

namespace App\Http\Controllers;

use App\Models\UserPublic;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserPublicRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserPublicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateUserPublicRequest $request)
    {
 

        if (!Auth::check()) {
            return "Dommage, vous n'êtes pas connecté";
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


        return response()->json([
            'user' => $userPublic,
            'state' => 'Profil public crée avec succès',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPublic  $userPublic
     * * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (UserPublic::where('user_id', '=', $id)->exists()) {
            $userPublic = UserPublic::where('user_id', '=', $id)->first();

            return response()->json([
                'user' => $userPublic,
                'state' => 'Profil public trouvé',
                'finded' => true,
            ]);
        } else {
            return response()->json([
                'state' => 'Profil public non trouvé',
                'finded' => false,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPublic  $userPublic
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPublic $userPublic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPublic  $userPublic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPublic $userPublic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPublic  $userPublic
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPublic $userPublic)
    {
        //
    }
}
