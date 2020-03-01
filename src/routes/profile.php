<?php 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../src/controller/ProfileController.php';

// get by gamertag customers 
$app->get('/api/{platform}/{profile}', function(Request $request, Response $response){

    $profileController = new ProfileController();

    $platform = $request->getAttribute('platform');
    $gamertag = $request->getAttribute('profile');

    $profileController->getProfile($platform, $gamertag);

     //write guzzle data to $response body  
     $response->getBody()->write(ProfileController::$profileData);
   
});