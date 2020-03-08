<?php 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use ApexLegendsTracker\Src\Config\RequestLogger as RequestLogger;
use ApexLegendsTracker\Src\Controller\ProfileController as ProfileController;

// get by apex legends profile gamertag and platform
$app->get('/api/{platform}/{profile}', function(Request $request, Response $response){

   $requestLogger = new RequestLogger('request-logs.txt');

   $profileController = new ProfileController();

   $platform = $request->getAttribute('platform');
   $gamertag = $request->getAttribute('profile');

   $requestLogger->LogRequest([$platform, $gamertag]);

   $profileController->getProfile($platform, $gamertag);

    if (!empty(ProfileController::$profileData)) : 
        //write guzzle data to $response body  
        $response->getBody()->write(ProfileController::$profileData);

     else :

        //write error to $response body  
        $response->getBody()->write('404 - params not set');

     endif;
   
});