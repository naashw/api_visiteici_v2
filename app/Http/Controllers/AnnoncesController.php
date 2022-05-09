<?php

namespace App\Http\Controllers;

use App\Http\Requests\showAnnoncesRequest;
use App\Interfaces\AnnoncesRepositoryInterface;
use App\Models\Annonces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AnnoncesRepository;
use App\Providers\RepositoryServiceProvider;
use Exception;
use Illuminate\Http\JsonResponse;

class AnnoncesController extends Controller
{
    private AnnoncesRepositoryInterface $AnnoncesRepository;

    public function __construct(AnnoncesRepositoryInterface $AnnoncesRepository) 
    {
        $this->AnnoncesRepository = $AnnoncesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        return response()->json($this->AnnoncesRepository->getAnnoncesByParams($request->all()));
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
    public function show($id) : JsonResponse
    {
        return response()->json($this->AnnoncesRepository->getAnnonceById($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annonces  $annonces
     * @return \Illuminate\Http\Response
     */
    public function edit(Annonces $annonces)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annonces  $annonces
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annonces $annonces)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annonces  $annonces
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annonces $annonces)
    {
        //
    }
}
