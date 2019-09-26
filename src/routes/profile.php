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
            //store guzzle resonse response
            $gResponse = $client->get($platform.'/'.$gamertag, ['headers' => headers
            ]);

            //wite guzzle data to $response body  
            $response->getBody()->write($gResponse->getBody());
            
            //if response body is filled with data
            if ($response->getBody() !== '') {
                //return guzzle response data as $reponse
                return json_encode($response);
            } else {
                $response->getBody()->write('there was a problem fetching the profile');
                return $response;
            }
            
         
        } catch (\Throwable $th) {
            //set the response body
            $responseBody = $exception->getResponse()->getBody(true);

            return $responseBody;
        }

    } else {
        $response->getBody()->write('request parameters not set');
        echo 'request parameters not set';
        return $response;
    }
    
});



