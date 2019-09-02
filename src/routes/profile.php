<?php 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// get by gamertag customers 
$app->get('/api/{platform}/{profile}', function(Request $request, Response $response){

    require '../config.php';

    $platform = $request->getAttribute('platform');
    $gamertag = $request->getAttribute('profile');

    //check if params are set
    if (isset($platform) && isset($gamertag)) {

        try {
            $response = $client->get($platform.'/'.$gamertag, ['headers' => headers
            ]);
            print_r(json_decode($response->getBody(), true));  
        } catch (\Throwable $th) {
            $responseBody = $exception->getResponse()->getBody(true);
        }

    } else {
        echo 'request parameters not set';
    }
});


