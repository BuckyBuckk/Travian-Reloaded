<?php

namespace App\Http\Controllers;

require "/var/www/vendor/autoload.php";
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class GetCurrentResourcesController extends Controller
{
    public function calculate($id){

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => '172.20.0.5/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        $villagePreviousResourcesResponse = $client->request('GET', 'villageResources/'.$id)->getBody();
        $villagePreviousResources = (array) json_decode($villagePreviousResourcesResponse);

        $villageMaxResourcesResponse = $client->request('GET', 'villageMaxResources/'.$id)->getBody();
        $villageMaxResources = (array) json_decode($villageMaxResourcesResponse);

        $villageProductionResponse = $client->request('GET', 'villageProductions/'.$id)->getBody();
        $villageProduction = (array) json_decode($villageProductionResponse);

        var_dump($villagePreviousResources);
        echo "<br/>";
        var_dump($villageMaxResources);
        echo "<br/>";
        var_dump($villageProduction);
        echo "<br/>";

        $currentTime = time();

        $timeDiff = ($currentTime - $villagePreviousResources["lastUpdate"]) / 3600;

        var_dump($currentTime);
        echo "<br/>";
        var_dump($villagePreviousResources["lastUpdate"]);
        echo "<br/>";
        var_dump($timeDiff);

        $newWood = $villagePreviousResources["currentWood"] + $timeDiff*$villageProduction["productionWood"];
        $newClay = $villagePreviousResources["currentClay"] + $timeDiff*$villageProduction["productionClay"];
        $newIron = $villagePreviousResources["currentIron"] + $timeDiff*$villageProduction["productionIron"];
        $newCrop = $villagePreviousResources["currentCrop"] + $timeDiff*$villageProduction["productionCrop"];

        var_dump($newWood);
        echo "<br/>";
        var_dump($newClay);
        echo "<br/>";
        var_dump($newIron);
        echo "<br/>";
        var_dump($newCrop);
        echo "<br/>";

        if($newWood >= $villageMaxResources["maxWood"]){ $newWood = $villageMaxResources["maxWood"]; }
        if($newClay >= $villageMaxResources["maxClay"]){ $newClay = $villageMaxResources["maxClay"]; }
        if($newIron >= $villageMaxResources["maxIron"]){ $newIron = $villageMaxResources["maxIron"]; }
        if($newCrop >= $villageMaxResources["maxCrop"]){ $newCrop = $villageMaxResources["maxCrop"]; }

        var_dump($newWood);
        echo "<br/>";
        var_dump($newClay);
        echo "<br/>";
        var_dump($newIron);
        echo "<br/>";
        var_dump($newCrop);
        echo "<br/>";

        
    }
}
