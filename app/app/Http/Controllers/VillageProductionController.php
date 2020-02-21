<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VillageProduction;
use App\Http\Resources\VillageProductionResource;

class VillageProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get articles
        $villageProduction = VillageProduction::all();

        //return VillageProduction::all();
        
        // Return collection of articles as a resource;
        return VillageProductionResource::collection($villageProduction);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $villageProduction =  new VillageProduction;

        $villageProduction->idVillage = $request->input('idVillage');
        $villageProduction->productionWood = $request->input('productionWood');
        $villageProduction->productionClay = $request->input('productionClay');
        $villageProduction->productionIron = $request->input('productionIron');
        $villageProduction->productionCrop = $request->input('productionCrop');

        if($villageProduction->save()) {
            return new VillageProductionResource($villageProduction);
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
        $villageProduction = VillageProduction::findOrFail($id);

        // Return single article as a resource
        return new VillageProductionResource($villageProduction);
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
        $villageProduction =  VillageProduction::findOrFail($id);

        $villageProduction->idVillage = $request->input('idVillage');
        $villageProduction->productionWood = $request->input('productionWood');
        $villageProduction->productionClay = $request->input('productionClay');
        $villageProduction->productionIron = $request->input('productionIron');
        $villageProduction->productionCrop = $request->input('productionCrop');

        if($villageProduction->save()) {
            return new VillageProductionResource($villageProduction);
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
        $villageProduction = VillageProduction::findOrFail($id);

        if($villageProduction->delete()) {
            return new VillageProductionResource($villageProduction);
        }    
    }
}