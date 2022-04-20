<?php

namespace App\Http\Controllers;

use App\Models\annonces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnoncesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {

        //On récupère les url des photos de la table photos
        $photos = DB::table('photos')->select('biens_id', DB::raw("GROUP_CONCAT(photos) photos "))
            ->groupBy('annonces_id');

        $appartements = DB::table('biens_appartements')->select('id as biens_id, *');

        //On récupère tous les annonces de la table annonces
        $annonces = DB::table('annonces')
            //->join('biens_appartements', 'annonces.biens_id', '=', 'biens_appartements.id')
            ->joinSub($appartements, 'biens_appartements', function ($join) {
                $join->on('annonces.biens_id', '=', 'biens_id');
            })
            ->joinSub($photos, 'photos', function ($join) {
                $join->on('annonces.biens_id', '=', 'photos.biens_id');
            })
            ->orderBy('annonces.id', 'desc');

        //On filtre les annonces en fonction des critères de recherche si il y en à une
        $request->input("text") ? $annonces = $annonces->where('biens_appartements.nom', 'like', '%' . $request->input("text") . '%') : '';

        $request->input("userId") ? $annonces = $annonces->where('annonces.user_id', '=', $request->input("userId")) : '';

        //On filtre les annonces par nombres voulu dans la requete
        $request->input("nb") ? $annonces = $annonces->take($request->input("nb")) : '';

        $annonces = $annonces->get();

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //On récupère les url des photos de la table photos
        $photos = DB::table('photos')->select('biens_id', DB::raw("GROUP_CONCAT(photos) photos "))
            ->groupBy('annonces_id');

        //On récupère tous les annonces de la table annonces
        $annonces = DB::table('annonces')
            ->where('annonces.id', '=', $id)
            ->join('biens_appartements', 'annonces.biens_id', '=', 'biens_appartements.id')
            ->joinSub($photos, 'photos', function ($join) {
                $join->on('annonces.biens_id', '=', 'photos.biens_id');
            })
            ->get();

        return response()->json($annonces);
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
