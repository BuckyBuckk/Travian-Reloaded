<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VillageFieldLevels;
use App\Http\Resources\VillageFieldLevelsResource;

class VillageFieldLevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get articles
        $villageFieldLevels = VillageFieldLevels::all();

        //return VillageFieldLevels::all();
        
        // Return collection of articles as a resource;
        return VillageFieldLevelsResource::collection($villageFieldLevels);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $villageFieldLevels =  new VillageFieldLevels;

        $villageFieldLevels->idVillage = $request->input('idVillage');
        $villageFieldLevels->resField1Level = $request->input('resField1Level');
        $villageFieldLevels->resField2Level = $request->input('resField2Level');
        $villageFieldLevels->resField3Level = $request->input('resField3Level');
        $villageFieldLevels->resField4Level = $request->input('resField4Level');
        $villageFieldLevels->resField5Level = $request->input('resField5Level');
        $villageFieldLevels->resField6Level = $request->input('resField6Level');
        $villageFieldLevels->resField7Level = $request->input('resField7Level');
        $villageFieldLevels->resField8Level = $request->input('resField8Level');
        $villageFieldLevels->resField9Level = $request->input('resField9Level');
        $villageFieldLevels->resField10Level = $request->input('resField10Level');
        $villageFieldLevels->resField11Level = $request->input('resField11Level');
        $villageFieldLevels->resField12Level = $request->input('resField12Level');
        $villageFieldLevels->resField13Level = $request->input('resField13Level');
        $villageFieldLevels->resField14Level = $request->input('resField14Level');
        $villageFieldLevels->resField15Level = $request->input('resField15Level');
        $villageFieldLevels->resField16Level = $request->input('resField16Level');
        $villageFieldLevels->resField17Level = $request->input('resField17Level');
        $villageFieldLevels->resField18Level = $request->input('resField18Level');

        if($villageFieldLevels->save()) {
            return new VillageFieldLevelsResource($villageFieldLevels);
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
        $villageFieldLevels = VillageFieldLevels::findOrFail($id);

        // Return single article as a resource
        return new VillageFieldLevelsResource($villageFieldLevels);
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
        $villageFieldLevels =  VillageFieldLevels::findOrFail($id);

        $villageFieldLevels->idVillage = $request->input('idVillage');
        $villageFieldLevels->resField1Level = $request->input('resField1Level');
        $villageFieldLevels->resField2Level = $request->input('resField2Level');
        $villageFieldLevels->resField3Level = $request->input('resField3Level');
        $villageFieldLevels->resField4Level = $request->input('resField4Level');
        $villageFieldLevels->resField5Level = $request->input('resField5Level');
        $villageFieldLevels->resField6Level = $request->input('resField6Level');
        $villageFieldLevels->resField7Level = $request->input('resField7Level');
        $villageFieldLevels->resField8Level = $request->input('resField8Level');
        $villageFieldLevels->resField9Level = $request->input('resField9Level');
        $villageFieldLevels->resField10Level = $request->input('resField10Level');
        $villageFieldLevels->resField11Level = $request->input('resField11Level');
        $villageFieldLevels->resField12Level = $request->input('resField12Level');
        $villageFieldLevels->resField13Level = $request->input('resField13Level');
        $villageFieldLevels->resField14Level = $request->input('resField14Level');
        $villageFieldLevels->resField15Level = $request->input('resField15Level');
        $villageFieldLevels->resField16Level = $request->input('resField16Level');
        $villageFieldLevels->resField17Level = $request->input('resField17Level');
        $villageFieldLevels->resField18Level = $request->input('resField18Level');

        if($villageFieldLevels->save()) {
            return new VillageFieldLevelsResource($villageFieldLevels);
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
        $villageFieldLevels = VillageFieldLevels::findOrFail($id);

        if($villageFieldLevels->delete()) {
            return new VillageFieldLevelsResource($villageFieldLevels);
        }    
    }
}