<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AllVillages;
use App\Http\Resources\VillageResource;

class AllVillagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get articles
        $villages = AllVillages::all();

        //return AllVillages::all();
        
        // Return collection of articles as a resource;
        return VillageResource::collection($villages);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $villages =  new AllVillages;

        $villages->idVillage = $request->input('idVillage');
        $villages->idPlayer = $request->input('idPlayer');
        $villages->Xcoordinate = $request->input('Xcoordinate');
        $villages->Ycoordinate = $request->input('Ycoordinate');
        $villages->villageName = $request->input('villageName');
        $villages->capital = $request->input('capital');

        if($villages->save()) {
            return new VillageResource($villages);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get article
        $villages = AllVillages::findOrFail($id);

        // Return single article as a resource
        return new VillageResource($villages);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $villages =  AllVillages::findOrFail($id);

        $villages->idVillage = $request->input('idVillage');
        $villages->idPlayer = $request->input('idPlayer');
        $villages->Xcoordinate = $request->input('Xcoordinate');
        $villages->Ycoordinate = $request->input('Ycoordinate');
        $villages->villageName = $request->input('villageName');
        $villages->capital = $request->input('capital');

        if($villages->save()) {
            return new VillageResource($villages);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $villages = AllVillages::findOrFail($id);

        if($villages->delete()) {
            return new VillageResource($villages);
        }    
    }
}
