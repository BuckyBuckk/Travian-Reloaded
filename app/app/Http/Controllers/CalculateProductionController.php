<?php

namespace App\Http\Controllers;

require "/var/www/vendor/autoload.php";
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class CalculateProductionController extends Controller
{
    public function calculate($id)
    {
        $resourceInfoLookupJson = file_get_contents("/var/www/storage/app/public/infoTables/resourceInfoLookup.json");
        $resourceInfoLookup = (array) json_decode($resourceInfoLookupJson);

        //var_dump($resourceInfoLookup);

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => '172.20.0.5/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        
        $villageResFieldLevelsResponse = $client->request('GET', 'villageFieldLevels/'.$id)->getBody();
        $villageResFieldLevels = (array) json_decode($villageResFieldLevelsResponse);

        $villageResFieldTypesResponse = $client->request('GET', 'villageFieldTypes/'.$id)->getBody();
        $villageResFieldTypes = (array) json_decode($villageResFieldTypesResponse);

        $productionWood = 0;
        $productionClay = 0;
        $productionIron = 0;
        $productionCrop = 0;


        for($i = 1; $i < 19; $i++){
            $villageResFieldType = $villageResFieldTypes["resField".$i."Type"];
            $villageResFieldLevel = $villageResFieldLevels["resField".$i."Level"];

            if($villageResFieldType == "wood"){
                $productionWood += $resourceInfoLookup["Woodcutter"]->production[$villageResFieldLevel];
            }
            else if($villageResFieldType == "clay"){
                $productionClay += $resourceInfoLookup["Claypit"]->production[$villageResFieldLevel];
            }
            else if($villageResFieldType == "iron"){
                $productionIron += $resourceInfoLookup["Ironmine"]->production[$villageResFieldLevel];
            }
            else if($villageResFieldType == "crop"){
                $productionCrop += $resourceInfoLookup["Cropland"]->production[$villageResFieldLevel];
            }
        }

        $villageResFieldProductionPostRequest = $client->request('PUT', 'villageProductions/'.$id, [
            'form_params' => [
                'idVillage' => $id,
                'productionWood' => $productionWood,
                'productionClay' => $productionClay,
                'productionIron' => $productionIron,
                'productionCrop' => $productionCrop,
            ]
        ]);

        return $villageResFieldProductionPostRequest->getBody();
    }
}
