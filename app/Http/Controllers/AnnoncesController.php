<?php

namespace App\Http\Controllers;

use App\Models\annonces;
use App\Models\Appartements;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnoncesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //On récupère tous les annonces de la table annonce
        $annonces = DB::table('annonces')->join('biens_appartements', 'annonces.bien_id', '=', 'biens_appartements.id')->get();
        
        //On retourne les annonces à la vue
        return response()->json($annonces);
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
     * @param  \App\Models\annonces  $annonces
     * @return \Illuminate\Http\Response
     */
    public function show(annonces $annonces)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\annonces  $annonces
     * @return \Illuminate\Http\Response
     */
    public function edit(annonces $annonces)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\annonces  $annonces
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, annonces $annonces)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\annonces  $annonces
     * @return \Illuminate\Http\Response
     */
    public function destroy(annonces $annonces)
    {
        //
    }
}
