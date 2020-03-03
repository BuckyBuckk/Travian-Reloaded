<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SendTroops;
use App\Http\Resources\SendTroopsResource;

class SendTroopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get articles
        $sendTroops = SendTroops::all();

        //return SendTroops::all();
        
        // Return collection of articles as a resource;
        return SendTroopsResource::collection($sendTroops);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sendTroops =  new SendTroops;

        $sendTroops->sendTroopsId = $request->input('sendTroopsId');
        $sendTroops->sendType = $request->input('sendType');
        $sendTroops->idVillageFrom = $request->input('idVillageFrom');
        $sendTroops->idVillageTo = $request->input('idVillageTo');
        $sendTroops->timeSent = $request->input('timeSent');
        $sendTroops->timeArrived = $request->input('timeArrived');
        $sendTroops->troopTribe = $request->input('troopTribe');
        $sendTroops->troop1num = $request->input('troop1num');
        $sendTroops->troop2num = $request->input('troop2num');
        $sendTroops->troop3num = $request->input('troop3num');
        $sendTroops->troop4num = $request->input('troop4num');
        $sendTroops->troop5num = $request->input('troop5num');
        $sendTroops->troop6num = $request->input('troop6num');
        $sendTroops->troop7num = $request->input('troop7num');
        $sendTroops->troop8num = $request->input('troop8num');
        $sendTroops->troop9num = $request->input('troop9num');
        $sendTroops->troop10num = $request->input('troop10num');

        if($sendTroops->save()) {
            return new SendTroopsResource($sendTroops);
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
        $sendTroops = SendTroops::where('idVillageFrom', $id)->orWhere('idVillageTo', $id)->get();

        // Return single article as a resource
        return new SendTroopsResource($sendTroops);
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
        $sendTroops =  SendTroops::findOrFail($id);

        $sendTroops->sendTroopsId = $request->input('sendTroopsId');
        $sendTroops->sendType = $request->input('sendType');
        $sendTroops->idVillageFrom = $request->input('idVillageFrom');
        $sendTroops->idVillageTo = $request->input('idVillageTo');
        $sendTroops->timeSent = $request->input('timeSent');
        $sendTroops->timeArrived = $request->input('timeArrived');
        $sendTroops->troopTribe = $request->input('troopTribe');
        $sendTroops->troop1num = $request->input('troop1num');
        $sendTroops->troop2num = $request->input('troop2num');
        $sendTroops->troop3num = $request->input('troop3num');
        $sendTroops->troop4num = $request->input('troop4num');
        $sendTroops->troop5num = $request->input('troop5num');
        $sendTroops->troop6num = $request->input('troop6num');
        $sendTroops->troop7num = $request->input('troop7num');
        $sendTroops->troop8num = $request->input('troop8num');
        $sendTroops->troop9num = $request->input('troop9num');
        $sendTroops->troop10num = $request->input('troop10num');

        if($sendTroops->save()) {
            return new SendTroopsResource($sendTroops);
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
        $sendTroops = SendTroops::findOrFail($id);

        if($sendTroops->delete()) {
            return new SendTroopsResource($sendTroops);
        }    
    }
}