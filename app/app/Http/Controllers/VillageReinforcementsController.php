<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VillageReinforcements;
use App\Http\Resources\VillageReinforcementsResource;

class VillageReinforcementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get articles
        $villageReinforcements = VillageReinforcements::all();

        //return VillageReinforcements::all();
        
        // Return collection of articles as a resource;
        return VillageReinforcementsResource::collection($villageReinforcements);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $villageReinforcements =  new VillageReinforcements;

        $villageReinforcements->reinforcementId = $request->input('reinforcementId');
        $villageReinforcements->idvillage = $request->input('idVillage');
        $villageReinforcements->idVillageFrom = $request->input('idVillageFrom');
        $villageReinforcements->tribe = $request->input('tribe');
        $villageReinforcements->troop1 = $request->input('troop1');
        $villageReinforcements->troop2 = $request->input('troop2');
        $villageReinforcements->troop3 = $request->input('troop3');
        $villageReinforcements->troop4 = $request->input('troop4');
        $villageReinforcements->troop5 = $request->input('troop5');
        $villageReinforcements->troop6 = $request->input('troop6');
        $villageReinforcements->troop7 = $request->input('troop7');
        $villageReinforcements->troop8 = $request->input('troop8');
        $villageReinforcements->troop9 = $request->input('troop9');
        $villageReinforcements->troop10 = $request->input('troop10');

        if($villageReinforcements->save()) {
            return new VillageReinforcementsResource($villageReinforcements);
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
        $villageReinforcements = VillageReinforcements::where('idVillage', $id)->get();

        // Return single article as a resource
        return new VillageReinforcementsResource($villageReinforcements);
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
        $villageReinforcements =  VillageReinforcements::findOrFail($id);

        $villageReinforcements->reinforcementId = $request->input('reinforcementId');
        $villageReinforcements->idvillage = $request->input('idvillage');
        $villageReinforcements->idVillageFrom = $request->input('idVillageFrom');
        $villageReinforcements->tribe = $request->input('tribe');
        $villageReinforcements->troop1 = $request->input('troop1');
        $villageReinforcements->troop2 = $request->input('troop2');
        $villageReinforcements->troop3 = $request->input('troop3');
        $villageReinforcements->troop4 = $request->input('troop4');
        $villageReinforcements->troop5 = $request->input('troop5');
        $villageReinforcements->troop6 = $request->input('troop6');
        $villageReinforcements->troop7 = $request->input('troop7');
        $villageReinforcements->troop8 = $request->input('troop8');
        $villageReinforcements->troop9 = $request->input('troop9');
        $villageReinforcements->troop10 = $request->input('troop10');

        if($villageReinforcements->save()) {
            return new VillageReinforcementsResource($villageReinforcements);
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
        $villageReinforcements = VillageReinforcements::findOrFail($id);

        if($villageReinforcements->delete()) {
            return new VillageReinforcementsResource($villageReinforcements);
        }    
    }
}