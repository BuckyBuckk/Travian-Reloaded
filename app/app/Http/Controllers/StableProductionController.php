<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StableProduction;
use App\Http\Resources\StableProductionResource;

class StableProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get articles
        $stableProduction = StableProduction::all();

        //return StableProduction::all();
        
        // Return collection of articles as a resource;
        return StableProductionResource::collection($stableProduction);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stableProduction =  new StableProduction;

        $stableProduction->idVillage = $request->input('idVillage');
        $stableProduction->troopName = $request->input('troopName');
        $stableProduction->troopId = $request->input('troopId');
        $stableProduction->troopCount = $request->input('troopCount');
        $stableProduction->troopProdTime = $request->input('troopProdTime');
        $stableProduction->timeStarted = $request->input('timeStarted');
        $stableProduction->timeCompleted = $request->input('timeCompleted');
        $stableProduction->barrProdId = $request->input('barrProdId');
        $stableProduction->lastUpdate = $request->input('lastUpdate');
        $stableProduction->troopsDoneAlready = $request->input('troopsDoneAlready');

        if($stableProduction->save()) {
            return new StableProductionResource($stableProduction);
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
        $stableProduction = StableProduction::findOrFail($id);

        // Return single article as a resource
        return new StableProductionResource($stableProduction);
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
        $stableProduction =  StableProduction::findOrFail($id);

        $stableProduction->idVillage = $request->input('idVillage');
        $stableProduction->troopName = $request->input('troopName');
        $stableProduction->troopId = $request->input('troopId');
        $stableProduction->troopCount = $request->input('troopCount');
        $stableProduction->troopProdTime = $request->input('troopProdTime');
        $stableProduction->timeStarted = $request->input('timeStarted');
        $stableProduction->timeCompleted = $request->input('timeCompleted');
        $stableProduction->barrProdId = $request->input('barrProdId');
        $stableProduction->lastUpdate = $request->input('lastUpdate');
        $stableProduction->troopsDoneAlready = $request->input('troopsDoneAlready');

        if($stableProduction->save()) {
            return new StableProductionResource($stableProduction);
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
        $stableProduction = StableProduction::findOrFail($id);

        if($stableProduction->delete()) {
            return new StableProductionResource($stableProduction);
        }    
    }
}