<?php

namespace App\Http\Controllers;

use App\Models\UserPublic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $userPublic = UserPublic::where('user_id', '=', $id)
            ->get();


        if (sizeof($userPublic) == 0) {
            $userPublic = DB::table('users')
                ->where('users.id', '=', $id)
                ->select('users.name as name_public')
                ->get();
        }


        return response()->json($userPublic[0]);
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
