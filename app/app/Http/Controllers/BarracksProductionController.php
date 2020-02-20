<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarracksProduction;
use App\Http\Resources\BarracksProductionResource;

class BarracksProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get articles
        $barracksProduction = BarracksProduction::all();

        //return BarracksProduction::all();
        
        // Return collection of articles as a resource;
        return BarracksProductionResource::collection($barracksProduction);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barracksProduction =  new BarracksProduction;

        $barracksProduction->idVillage = $request->input('idVillage');
        $barracksProduction->troopName = $request->input('troopName');
        $barracksProduction->troopId = $request->input('troopId');
        $barracksProduction->troopCount = $request->input('troopCount');
        $barracksProduction->troopProdTime = $request->input('troopProdTime');
        $barracksProduction->timeStarted = $request->input('timeStarted');
        $barracksProduction->timeCompleted = $request->input('timeCompleted');
        $barracksProduction->barrProdId = $request->input('barrProdId');
        $barracksProduction->lastUpdate = $request->input('lastUpdate');
        $barracksProduction->troopsDoneAlready = $request->input('troopsDoneAlready');

        if($barracksProduction->save()) {
            return new BarracksProductionResource($barracksProduction);
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
        $barracksProduction = BarracksProduction::findOrFail($id);

        // Return single article as a resource
        return new BarracksProductionResource($barracksProduction);
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
        $barracksProduction =  BarracksProduction::findOrFail($id);

        $barracksProduction->idVillage = $request->input('idVillage');
        $barracksProduction->troopName = $request->input('troopName');
        $barracksProduction->troopId = $request->input('troopId');
        $barracksProduction->troopCount = $request->input('troopCount');
        $barracksProduction->troopProdTime = $request->input('troopProdTime');
        $barracksProduction->timeStarted = $request->input('timeStarted');
        $barracksProduction->timeCompleted = $request->input('timeCompleted');
        $barracksProduction->barrProdId = $request->input('barrProdId');
        $barracksProduction->lastUpdate = $request->input('lastUpdate');
        $barracksProduction->troopsDoneAlready = $request->input('troopsDoneAlready');

        if($barracksProduction->save()) {
            return new BarracksProductionResource($barracksProduction);
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
        $barracksProduction = BarracksProduction::findOrFail($id);

        if($barracksProduction->delete()) {
            return new BarracksProductionResource($barracksProduction);
        }    
    }
}