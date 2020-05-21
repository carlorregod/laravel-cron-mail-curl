<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Biblioteca extends Controller
{
    public function curlMethodExample(){
        $url = "http://my.domain.com/test.php"; 
        $client = new \GuzzleHttp\Client(); 
        $id = 5; 
        $value = "ABC"; 
        $method='GET'; //O puede ser 'POST' 
        $response = $client->request($method, 
                    $url, ['query' => [ 'key1' => $id, 'key2' => $value, ]]); // url will be: Http://my.domain.com/test.php?key1=5&key2=ABC; $statusCode = 
        $response->getStatusCode(); 
        $content = $response->getBody();

    }
}
