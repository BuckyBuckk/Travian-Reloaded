<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ResFieldUpgrades;
use App\Http\Resources\ResFieldUpgradesResource;

class ResFieldUpgradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get articles
        $resFieldUpgrades = ResFieldUpgrades::all();

        //return ResFieldUpgrades::all();
        
        // Return collection of articles as a resource;
        return ResFieldUpgradesResource::collection($resFieldUpgrades);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resFieldUpgrades =  new ResFieldUpgrades;

        $resFieldUpgrades->idVillage = $request->input('idVillage');
        $resFieldUpgrades->rfid = $request->input('rfid');
        $resFieldUpgrades->fieldType = $request->input('fieldType');
        $resFieldUpgrades->fieldLevel = $request->input('fieldLevel');
        $resFieldUpgrades->timeStarted = $request->input('timeStarted');
        $resFieldUpgrades->timeCompleted = $request->input('timeCompleted');
        $resFieldUpgrades->upgradeId = $request->input('upgradeId');

        if($resFieldUpgrades->save()) {
            return new ResFieldUpgradesResource($resFieldUpgrades);
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
        $resFieldUpgrades = ResFieldUpgrades::where('idVillage', $id)->get();

        // Return single article as a resource
        return new ResFieldUpgradesResource($resFieldUpgrades);
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
        $resFieldUpgrades =  ResFieldUpgrades::findOrFail($id);

        $resFieldUpgrades->idVillage = $request->input('idVillage');
        $resFieldUpgrades->rfid = $request->input('rfid');
        $resFieldUpgrades->fieldType = $request->input('fieldType');
        $resFieldUpgrades->fieldLevel = $request->input('fieldLevel');
        $resFieldUpgrades->timeStarted = $request->input('timeStarted');
        $resFieldUpgrades->timeCompleted = $request->input('timeCompleted');
        $resFieldUpgrades->upgradeId = $request->input('upgradeId');

        if($resFieldUpgrades->save()) {
            return new ResFieldUpgradesResource($resFieldUpgrades);
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
        $resFieldUpgrades = ResFieldUpgrades::findOrFail($id);

        if($resFieldUpgrades->delete()) {
            return new ResFieldUpgradesResource($resFieldUpgrades);
        }    
    }
}