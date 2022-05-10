<?php

namespace App\Http\Controllers;

use App\Models\UserPublic;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserPublicRequest;
use App\Interfaces\UserPublicRepositoryInterface;


class UserPublicController extends Controller
{
    public function __construct(private UserPublicRepositoryInterface $UserPublicRepository) 
    {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserPublic::all();
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

        return response()->json([
            'user' =>   $this->UserPublicRepository->storeUserPublic($request),
            'state' => 'Profil public mis à jour avec succès',
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
            return $this->UserPublicRepository->getUserById($id);
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
