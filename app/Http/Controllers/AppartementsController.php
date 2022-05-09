<?php

namespace App\Http\Controllers;

use App\Models\Appartements;
use App\Models\Annonces;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAppartementRequest;
use App\Interfaces\AppartementsRepositoryInterface;
use App\Models\Photos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AppartementsController extends Controller
{
    private AppartementsRepositoryInterface $AppartementsRepository;

    public function __construct(AppartementsRepositoryInterface $AppartementsRepository)
    {
        $this->AppartementsRepository = $AppartementsRepository;
    }

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
    public function store(StoreAppartementRequest $request)
    {
        $AnnonceId = $this->AppartementsRepository->createAppartement($request, Auth::user());
        
        return response()->json([
            'id' => $AnnonceId,
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
