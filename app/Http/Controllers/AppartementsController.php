<?php

namespace App\Http\Controllers;

use App\Models\appartements;
use App\Models\annonces;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAppartementRequest;
use App\Models\photos;

use Illuminate\Support\Facades\Storage;

class AppartementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return appartements::all();
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
     * @param  \App\Http\Requests\StoreAppartementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppartementRequest $req)
    {
      
        $request = $req->validated();      
        
        $appartements = appartements::create([
            'categories' => $request['categories'],
            'nom' => $request['nom'],
            'description' => $request['description'],
            'code_postal' => $request['code_postal'],
            'ville' => $request['ville'],
            'adresse' => $request['adresse'],
            'prix' => $request['prix'],
            'charges_comprises' => $request['charges_comprises'],
            'meublé' => $request['meublé'],
            'surface' => $request['surface'],
            'nb_pieces' => $request['nb_pieces'],
            'nb_chambres' => $request['nb_chambres'],
            'fibre_optique' => $request['fibre_optique'],
            'balcon' => $request['balcon'],
            'terrasse' => $request['terrasse'],
            'terrasse_surface' => $request['terrasse_surface']?? "",
            'cave' => $request['cave'],
            'jardin' => $request['jardin'],
            'jardin_surface' => $request['jardin_surface']?? "",
            'parking' => $request['parking'],
            'garage' => $request['garage'],
            'ascenseur' => $request['ascenseur'],
            'classe_energie' => $request['classe_energie'],
            'GES' => $request['GES'],
        ]);
        
        $annonces = annonces::create([
            'user_id' => $req->user()->id,
            'biens_id' => $appartements->id,
            'biens_type' => $appartements->categories,
        ]);        
        
        $files = $request['photos'];
        
        if($files)
        {
            foreach($files as $file)
            {
                $fileUploaded = Storage::disk('public')->put('photos',$file);
                $url = Storage::url($fileUploaded);
                
                photos::create([
                    'user_id' => $req->user()->id,
                    'biens_id' => $appartements->id,
                    'annonces_id' => $annonces->id,
                    'photos' => asset($url),
                ]);
            }
        }

        return response()->json([
            'id' => $annonces->id,
            'state' => 'annonce crée avec succès',
        ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\appartements  $appartements
     * @return \Illuminate\Http\Response
     */
    public function show(appartements $appartements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\appartements  $appartements
     * @return \Illuminate\Http\Response
     */
    public function edit(appartements $appartements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\appartements  $appartements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, appartements $appartements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\appartements  $appartements
     * @return \Illuminate\Http\Response
     */
    public function destroy(appartements $appartements)
    {
        //
    }
}
