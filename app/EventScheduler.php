<?php
require "/var/www/vendor/autoload.php";
use GuzzleHttp\Client;

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => '172.20.0.5/api/',
    // You can set any number of default request options.
    'timeout'  => 2.0,
]);

$response = $client->request('GET', 'villageResources')->getBody();

echo $response . "\n";
//var_dump($response);

?>