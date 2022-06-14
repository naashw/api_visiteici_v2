<?php

namespace App\Http\Controllers;

use App\Models\VirtualTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VirtualTourController extends Controller
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VirtualTour  $virtualTour
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $res = VirtualTour::where('id' , '=' , $id)->with('virtualroom', 'virtualroom.virtualHotspot')->first();
        return response()->json($res);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VirtualTour  $VirtualTour
     * @return \Illuminate\Http\Response
     */
    public function edit(virtualTour $virtualTour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\virtualTour  $VirtualTour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, virtualTour $virtualTour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VirtualTour  $VirtualTour
     * @return \Illuminate\Http\Response
     */
    public function destroy(virtualTour $virtualTour)
    {
        //
    }
}
