<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VillageFieldTypes;
use App\Http\Resources\VillageFieldTypesResource;

class VillageFieldTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get articles
        $VillageFieldTypes = VillageFieldTypes::all();

        //return VillageFieldTypes::all();
        
        // Return collection of articles as a resource;
        return VillageFieldTypesResource::collection($VillageFieldTypes);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $VillageFieldTypes =  new VillageFieldTypes;

        $VillageFieldTypes->idVillage = $request->input('idVillage');
        $VillageFieldTypes->resField1Type = $request->input('resField1Type');
        $VillageFieldTypes->resField2Type = $request->input('resField2Type');
        $VillageFieldTypes->resField3Type = $request->input('resField3Type');
        $VillageFieldTypes->resField4Type = $request->input('resField4Type');
        $VillageFieldTypes->resField5Type = $request->input('resField5Type');
        $VillageFieldTypes->resField6Type = $request->input('resField6Type');
        $VillageFieldTypes->resField7Type = $request->input('resField7Type');
        $VillageFieldTypes->resField8Type = $request->input('resField8Type');
        $VillageFieldTypes->resField9Type = $request->input('resField9Type');
        $VillageFieldTypes->resField10Type = $request->input('resField10Type');
        $VillageFieldTypes->resField11Type = $request->input('resField11Type');
        $VillageFieldTypes->resField12Type = $request->input('resField12Type');
        $VillageFieldTypes->resField13Type = $request->input('resField13Type');
        $VillageFieldTypes->resField14Type = $request->input('resField14Type');
        $VillageFieldTypes->resField15Type = $request->input('resField15Type');
        $VillageFieldTypes->resField16Type = $request->input('resField16Type');
        $VillageFieldTypes->resField17Type = $request->input('resField17Type');
        $VillageFieldTypes->resField18Type = $request->input('resField18Type');

        if($VillageFieldTypes->save()) {
            return new VillageFieldTypesResource($VillageFieldTypes);
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
        $VillageFieldTypes = VillageFieldTypes::findOrFail($id);

        // Return single article as a resource
        return new VillageFieldTypesResource($VillageFieldTypes);
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
        $VillageFieldTypes =  VillageFieldTypes::findOrFail($id);

        $VillageFieldTypes->idVillage = $request->input('idVillage');
        $VillageFieldTypes->resField1Type = $request->input('resField1Type');
        $VillageFieldTypes->resField2Type = $request->input('resField2Type');
        $VillageFieldTypes->resField3Type = $request->input('resField3Type');
        $VillageFieldTypes->resField4Type = $request->input('resField4Type');
        $VillageFieldTypes->resField5Type = $request->input('resField5Type');
        $VillageFieldTypes->resField6Type = $request->input('resField6Type');
        $VillageFieldTypes->resField7Type = $request->input('resField7Type');
        $VillageFieldTypes->resField8Type = $request->input('resField8Type');
        $VillageFieldTypes->resField9Type = $request->input('resField9Type');
        $VillageFieldTypes->resField10Type = $request->input('resField10Type');
        $VillageFieldTypes->resField11Type = $request->input('resField11Type');
        $VillageFieldTypes->resField12Type = $request->input('resField12Type');
        $VillageFieldTypes->resField13Type = $request->input('resField13Type');
        $VillageFieldTypes->resField14Type = $request->input('resField14Type');
        $VillageFieldTypes->resField15Type = $request->input('resField15Type');
        $VillageFieldTypes->resField16Type = $request->input('resField16Type');
        $VillageFieldTypes->resField17Type = $request->input('resField17Type');
        $VillageFieldTypes->resField18Type = $request->input('resField18Type');

        if($VillageFieldTypes->save()) {
            return new VillageFieldTypesResource($VillageFieldTypes);
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
        $VillageFieldTypes = VillageFieldTypes::findOrFail($id);

        if($VillageFieldTypes->delete()) {
            return new VillageFieldTypesResource($VillageFieldTypes);
        }    
    }
}