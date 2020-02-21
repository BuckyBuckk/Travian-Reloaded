<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VillageResources;
use App\Http\Resources\VillageResourcesResource;

class VillageResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get articles
        $villageResources = VillageResources::all();

        //return VillageResources::all();
        
        // Return collection of articles as a resource;
        return VillageResourcesResource::collection($villageResources);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $villageResources =  new VillageResources;

        $villageResources->idVillage = $request->input('idVillage');
        $villageResources->currentWood = $request->input('currentWood');
        $villageResources->currentClay = $request->input('currentClay');
        $villageResources->currentIron = $request->input('currentIron');
        $villageResources->currentCrop = $request->input('currentCrop');
        $villageResources->lastUpdate = $request->input('lastUpdate');

        if($villageResources->save()) {
            return new VillageResourcesResource($villageResources);
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
        $villageResources = VillageResources::findOrFail($id);

        // Return single article as a resource
        return new VillageResourcesResource($villageResources);
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
        $villageResources =  VillageResources::findOrFail($id);

        $villageResources->idVillage = $request->input('idVillage');
        $villageResources->currentWood = $request->input('currentWood');
        $villageResources->currentClay = $request->input('currentClay');
        $villageResources->currentIron = $request->input('currentIron');
        $villageResources->currentCrop = $request->input('currentCrop');
        $villageResources->lastUpdate = $request->input('lastUpdate');

        if($villageResources->save()) {
            return new VillageResourcesResource($villageResources);
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
        $villageResources = VillageResources::findOrFail($id);

        if($villageResources->delete()) {
            return new VillageResourcesResource($villageResources);
        }    
    }
}