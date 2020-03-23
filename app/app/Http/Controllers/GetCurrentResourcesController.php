<?php

namespace App\Http\Controllers;

require "/var/www/vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Promise;

use Illuminate\Http\Request;

class GetCurrentResourcesController extends Controller
{
    public function calculate($id){

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => '172.20.0.5/api/',
            // You can set any number of default request options.
            'timeout'  => 5.0,
        ]);

        $promises = [
            'villagePreviousResourcesPromise' => $client->getAsync('villageResources/'.$id),
            'villageProductionPromise' => $client->getAsync('villageProductions/'.$id),
            'villageMaxResourcesPromise' => $client->getAsync('villageMaxResources/'.$id)
        ];

        $responses = Promise\unwrap($promises);
        $responses = Promise\settle($promises)->wait();
        
        $villagePreviousResourcesResponse = $responses['villagePreviousResourcesPromise']['value']->getBody();
        $villageProductionResponse = $responses['villageProductionPromise']['value']->getBody();
        $villageMaxResourcesResponse = $responses['villageMaxResourcesPromise']['value']->getBody();

        $villagePreviousResources = (array) json_decode($villagePreviousResourcesResponse);
        $villageMaxResources = (array) json_decode($villageMaxResourcesResponse);
        $villageProduction = (array) json_decode($villageProductionResponse);

        $currentTime = time();

        $timeDiff = ($currentTime - $villagePreviousResources["lastUpdate"]) / 3600;

        $newWood = $villagePreviousResources["currentWood"] + $timeDiff*$villageProduction["productionWood"];
        $newClay = $villagePreviousResources["currentClay"] + $timeDiff*$villageProduction["productionClay"];
        $newIron = $villagePreviousResources["currentIron"] + $timeDiff*$villageProduction["productionIron"];
        $newCrop = $villagePreviousResources["currentCrop"] + $timeDiff*$villageProduction["productionCrop"];

        if($newWood >= $villageMaxResources["maxWood"]){ $newWood = $villageMaxResources["maxWood"]; }
        if($newClay >= $villageMaxResources["maxClay"]){ $newClay = $villageMaxResources["maxClay"]; }
        if($newIron >= $villageMaxResources["maxIron"]){ $newIron = $villageMaxResources["maxIron"]; }
        if($newCrop >= $villageMaxResources["maxCrop"]){ $newCrop = $villageMaxResources["maxCrop"]; }

        $villageResourcesPostRequest = $client->request('PUT', 'villageResources/'.$id, [
            'form_params' => [
                'idVillage' => $id,
                'currentWood' => $newWood,
                'currentClay' => $newClay,
                'currentIron' => $newIron,
                'currentCrop' => $newCrop,
                'lastUpdate' => $currentTime
            ]
        ]);

        return $villageResourcesPostRequest->getBody();
        
    }
}
