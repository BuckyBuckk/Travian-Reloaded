<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VillageOwnTroops;
use App\Http\Resources\VillageOwnTroopsResource;

class VillageOwnTroopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get articles
        $villageOwnTroops = VillageOwnTroops::all();

        //return VillageOwnTroops::all();
        
        // Return collection of articles as a resource;
        return VillageOwnTroopsResource::collection($villageOwnTroops);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $villageOwnTroops =  new VillageOwnTroops;

        $villageOwnTroops->idVillage = $request->input('idVillage');
        $villageOwnTroops->troop1 = $request->input('troop1');
        $villageOwnTroops->troop2 = $request->input('troop2');
        $villageOwnTroops->troop3 = $request->input('troop3');
        $villageOwnTroops->troop4 = $request->input('troop4');
        $villageOwnTroops->troop5 = $request->input('troop5');
        $villageOwnTroops->troop6 = $request->input('troop6');
        $villageOwnTroops->troop7 = $request->input('troop7');
        $villageOwnTroops->troop8 = $request->input('troop8');
        $villageOwnTroops->troop9 = $request->input('troop9');
        $villageOwnTroops->troop10 = $request->input('troop10');

        if($villageOwnTroops->save()) {
            return new VillageOwnTroopsResource($villageOwnTroops);
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
        $villageOwnTroops = VillageOwnTroops::findOrFail($id);

        // Return single article as a resource
        return new VillageOwnTroopsResource($villageOwnTroops);
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
        $villageOwnTroops =  VillageOwnTroops::findOrFail($id);

        $villageOwnTroops->idVillage = $request->input('idVillage');
        $villageOwnTroops->troop1 = $request->input('troop1');
        $villageOwnTroops->troop2 = $request->input('troop2');
        $villageOwnTroops->troop3 = $request->input('troop3');
        $villageOwnTroops->troop4 = $request->input('troop4');
        $villageOwnTroops->troop5 = $request->input('troop5');
        $villageOwnTroops->troop6 = $request->input('troop6');
        $villageOwnTroops->troop7 = $request->input('troop7');
        $villageOwnTroops->troop8 = $request->input('troop8');
        $villageOwnTroops->troop9 = $request->input('troop9');
        $villageOwnTroops->troop10 = $request->input('troop10');

        if($villageOwnTroops->save()) {
            return new VillageOwnTroopsResource($villageOwnTroops);
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
        $villageOwnTroops = VillageOwnTroops::findOrFail($id);

        if($villageOwnTroops->delete()) {
            return new VillageOwnTroopsResource($villageOwnTroops);
        }    
    }
}