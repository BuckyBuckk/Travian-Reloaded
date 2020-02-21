<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VillageMaxResources;
use App\Http\Resources\VillageMaxResourcesResource;

class VillageMaxResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get articles
        $villageMaxResources = VillageMaxResources::all();

        //return VillageMaxResources::all();
        
        // Return collection of articles as a resource;
        return VillageMaxResourcesResource::collection($villageMaxResources);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $villageMaxResources =  new VillageMaxResources;

        $villageMaxResources->idVillage = $request->input('idVillage');
        $villageMaxResources->maxWood = $request->input('maxWood');
        $villageMaxResources->maxClay = $request->input('maxClay');
        $villageMaxResources->maxIron = $request->input('maxIron');
        $villageMaxResources->maxCrop = $request->input('maxCrop');

        if($villageMaxResources->save()) {
            return new VillageMaxResourcesResource($villageMaxResources);
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
        $villageMaxResources = VillageMaxResources::findOrFail($id);

        // Return single article as a resource
        return new VillageMaxResourcesResource($villageMaxResources);
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
        $villageMaxResources =  VillageMaxResources::findOrFail($id);

        $villageMaxResources->idVillage = $request->input('idVillage');
        $villageMaxResources->maxWood = $request->input('maxWood');
        $villageMaxResources->maxClay = $request->input('maxClay');
        $villageMaxResources->maxIron = $request->input('maxIron');
        $villageMaxResources->maxCrop = $request->input('maxCrop');

        if($villageMaxResources->save()) {
            return new VillageMaxResourcesResource($villageMaxResources);
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
        $villageMaxResources = VillageMaxResources::findOrFail($id);

        if($villageMaxResources->delete()) {
            return new VillageMaxResourcesResource($villageMaxResources);
        }    
    }
}