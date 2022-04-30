<?php

namespace App\Http\Controllers;

use App\Http\Requests\showAnnonceRequest;
use App\Models\Annonces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

        $appartements = DB::table('biens_appartements')->select('*', 'id as app_id');

        //On récupère tous les annonces de la table annonces
        $annonces = DB::table('annonces')
            //->join('biens_appartements', 'annonces.biens_id', '=', 'biens_appartements.id')
            ->leftJoinSub($appartements, 'biens_appartements', function ($join) {
                $join->on('annonces.biens_id', '=', 'biens_appartements.app_id');
            })
            ->leftjoinSub($photos, 'photos', function ($join) {
                $join->on('annonces.biens_id', '=', 'photos.biens_id');
            })
            ->select('photos.photos', 'biens_appartements.*', 'annonces.*')

            ->orderBy('annonces.id', 'desc');

        //On filtre les annonces en fonction des critères de recherche si il y en à une
        $request->input("text") ? $annonces = $annonces->where('biens_appartements.nom', 'like', '%' . $request->input("text") . '%') : '';

        $request->input("userId") ? $annonces = $annonces->where('annonces.user_id', '=', $request->input("userId")) : 'rien trouvé';


        //On filtre les annonces par nombres voulu dans la requete
        $request->input("nb") ? $annonces = $annonces->take($request->input("nb")) : '';

        //On retourne les annonces à la vue
        return response()->json($annonces->get());
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
     * @param  \App\Models\Annonces  $annonces
     * @return \Illuminate\Http\Response
     */
    public function show($id, Annonces $annonces)
    {
        //On vérifie si il exists avant de continuer
        if ($annonces->where('id', $id)->exists()) {
            //On récupère les url des photos de la table photos
            $photos = DB::table('photos')->select('biens_id', DB::raw("GROUP_CONCAT(photos) photos "))
                ->groupBy('annonces_id');

            //On récupère tous les annonces de la table annonces
            $annonces = DB::table('annonces')
                ->where('annonces.id', '=', $id)
                ->leftJoin('biens_appartements', 'annonces.biens_id', '=', 'biens_appartements.id')
                ->leftJoinSub($photos, 'photos', function ($join) {
                    $join->on('annonces.biens_id', '=', 'photos.biens_id');
                })
                ->get();

            return response()->json($annonces);
        } else {
            return response()->json(['error' => 'Annonce introuvable']);
        }
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
