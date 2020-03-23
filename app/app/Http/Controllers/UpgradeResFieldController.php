<?php

namespace App\Http\Controllers;

require "/var/www/vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Promise;

use Illuminate\Http\Request;

class UpgradeResFieldController extends Controller
{
    public function upgrade($id, $rfid){

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => '172.20.0.5/api/',
            // You can set any number of default request options.
            'timeout'  => 5.0,
        ]);

        $resourceInfoLookupJson = file_get_contents("/var/www/storage/app/public/infoTables/resourceInfoLookup.json");
        $resourceInfoLookup = (array) json_decode($resourceInfoLookupJson);

        $getDataPromises = [
            'villageResourcesPromise' => $client->getAsync('getCurrentResources/'.$id),
            'villageFieldLevelsPromise' => $client->getAsync('villageFieldLevels/'.$id),
            'villageFieldTypesPromise' => $client->getAsync('villageFieldTypes/'.$id)
        ];

        $responses = Promise\unwrap($getDataPromises);
        $responses = Promise\settle($getDataPromises)->wait();
        
        $villageResourcesResponse = $responses['villageResourcesPromise']['value']->getBody();
        $villageFieldLevelsResponse = $responses['villageFieldLevelsPromise']['value']->getBody();
        $villageFieldTypesResponse = $responses['villageFieldTypesPromise']['value']->getBody();

        $villageResources = (array) json_decode($villageResourcesResponse);
        $villageFieldLevels = (array) json_decode($villageFieldLevelsResponse);
        $villageFieldTypes = (array) json_decode($villageFieldTypesResponse);

        $villageFieldLevel = $villageFieldLevels["resField".$rfid."Level"];
        $villageFieldType = $villageFieldTypes["resField".$rfid."Type"];
        $villageFieldTypeLong = "";

        $upgradeRequirements = [];

        if($villageFieldType == "wood"){
            $upgradeRequirements["wood"] = $resourceInfoLookup["Woodcutter"]->wood[$villageFieldLevel];
            $upgradeRequirements["clay"] = $resourceInfoLookup["Woodcutter"]->clay[$villageFieldLevel];
            $upgradeRequirements["iron"] = $resourceInfoLookup["Woodcutter"]->iron[$villageFieldLevel];
            $upgradeRequirements["crop"] = $resourceInfoLookup["Woodcutter"]->crop[$villageFieldLevel];
            $upgradeRequirements["constructionTime"] = $resourceInfoLookup["Woodcutter"]->constructionTime[$villageFieldLevel];

            $villageFieldTypeLong = "Woodcutter";
        }
        else if($villageFieldType == "clay"){
            $upgradeRequirements["wood"] = $resourceInfoLookup["Claypit"]->wood[$villageFieldLevel];
            $upgradeRequirements["clay"] = $resourceInfoLookup["Claypit"]->clay[$villageFieldLevel];
            $upgradeRequirements["iron"] = $resourceInfoLookup["Claypit"]->iron[$villageFieldLevel];
            $upgradeRequirements["crop"] = $resourceInfoLookup["Claypit"]->crop[$villageFieldLevel];
            $upgradeRequirements["constructionTime"] = $resourceInfoLookup["Claypit"]->constructionTime[$villageFieldLevel];

            $villageFieldTypeLong = "Claypit";
        }
        else if($villageFieldType == "iron") {
            $upgradeRequirements["wood"] = $resourceInfoLookup["Ironmine"]->wood[$villageFieldLevel];
            $upgradeRequirements["clay"] = $resourceInfoLookup["Ironmine"]->clay[$villageFieldLevel];
            $upgradeRequirements["iron"] = $resourceInfoLookup["Ironmine"]->iron[$villageFieldLevel];
            $upgradeRequirements["crop"] = $resourceInfoLookup["Ironmine"]->crop[$villageFieldLevel];
            $upgradeRequirements["constructionTime"] = $resourceInfoLookup["Ironmine"]->constructionTime[$villageFieldLevel];

            $villageFieldTypeLong = "Ironmine";
        }
        else if($villageFieldType == "crop") {
            $upgradeRequirements["wood"] = $resourceInfoLookup["Cropland"]->wood[$villageFieldLevel];
            $upgradeRequirements["clay"] = $resourceInfoLookup["Cropland"]->clay[$villageFieldLevel];
            $upgradeRequirements["iron"] = $resourceInfoLookup["Cropland"]->iron[$villageFieldLevel];
            $upgradeRequirements["crop"] = $resourceInfoLookup["Cropland"]->crop[$villageFieldLevel];
            $upgradeRequirements["constructionTime"] = $resourceInfoLookup["Cropland"]->constructionTime[$villageFieldLevel];

            $villageFieldTypeLong = "Cropland";
        }

        if($villageResources["currentWood"] >= $upgradeRequirements["wood"] &&
                $villageResources["currentClay"] >= $upgradeRequirements["clay"] &&
                $villageResources["currentIron"] >= $upgradeRequirements["iron"] &&
                $villageResources["currentCrop"] >= $upgradeRequirements["crop"])
        {
            $currentTime = time();
            $newVillageResources = [];
            $newVillageResources["wood"] = $villageResources["currentWood"] - $upgradeRequirements["wood"];
            $newVillageResources["clay"] = $villageResources["currentClay"] - $upgradeRequirements["clay"];
            $newVillageResources["iron"] = $villageResources["currentIron"] - $upgradeRequirements["iron"];
            $newVillageResources["crop"] = $villageResources["currentCrop"] - $upgradeRequirements["crop"];
            
            $upgradePromises = [
                'resFieldUpgradesPromise' => $client->postAsync('resFieldUpgrades',[
                    'form_params' => [
                        'idVillage' => $id,
                        'rfid' => $rfid,
                        'fieldType' => "woodcutter",
                        'fieldLevel' => $villageFieldLevel+1,
                        'timeStarted' => $currentTime,
                        'timeCompleted' => $currentTime + $upgradeRequirements["constructionTime"]
                    ],
                ]),
                'villageNewResourcesPromise' => $client->putAsync('villageResources/'.$id,[
                    'form_params' => [
                        'idVillage' => $id,
                        'currentWood' => $newVillageResources["wood"],
                        'currentClay' => $newVillageResources["clay"],
                        'currentIron' => $newVillageResources["iron"],
                        'currentCrop' => $newVillageResources["crop"],
                        'lastUpdate' => $currentTime
                    ],
                ])
            ];
    
            $responses = Promise\unwrap($upgradePromises);
            $responses = Promise\settle($upgradePromises)->wait();
            
            $resFieldUpgradesResponse = $responses['resFieldUpgradesPromise']['value']->getBody();
            $villageNewResourcesResponse = $responses['villageNewResourcesPromise']['value']->getBody();
    
            $resFieldUpgrades = (array) json_decode($resFieldUpgradesResponse);
            $villageNewResources = (array) json_decode($villageNewResourcesResponse);
            
            if($resFieldUpgrades && $villageNewResources){
                return "{status: 'Ok'}";
            }
            else{
                return "{status: 'Error during requests'}";
            }
        }
        else{
            return "{status: 'Not enough resources'}";
        }
    }
}
