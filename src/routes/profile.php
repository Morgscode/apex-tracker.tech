<?php 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


// get by gamertag customers 
$app->get('/api/{platform}/{profile}', function(Request $request, Response $response){

    require '../config.php';

    $platform = $request->getAttribute('platform');
    $gamertag = $request->getAttribute('profile');

    //check if params are set
    if (isset($platform) && isset($gamertag)) {
        
        try {
            //store guzzle resonse response
            $gResponse = $client->get($platform.'/'.$gamertag, ['headers' => headers
            ]);

            $profileData = $gResponse->getBody();

            //write guzzle data to $response body  
            $response->getBody()->write($profileData);
               
        } catch (\Throwable $th) {
            //set the response body
            $responseBody = $th->getResponse()->getBody(true);

            //return $responseBody;
        }

    } else {
        //$response->getBody()->write('request parameters not set');
        //echo 'request parameters not set';
        //return $response;
    }
    
});



