<?php 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use ApexLegendsTracker\Src\Config\RequestLogger as RequestLogger;
use ApexLegendsTracker\Src\Controller\ProfileController as ProfileController;

// get by apex legends profile gamertag and platform
$app->get('/api/v1/{platform}/{profile}', function(Request $request, Response $response){

   $requestLogger = new RequestLogger('profile-request-logs.json');

   $requestLogger->logProfileRequest($request);

   $profileController = new ProfileController();

   $platform = $request->getAttribute('platform');
   $gamertag = $request->getAttribute('profile');

   $profileController->getProfile($platform, $gamertag);

    if (!empty(ProfileController::$profileData)) : 
        //write guzzle data to $response body  
        $response->getBody()->write(ProfileController::$profileData);

     else :

        //write error to $response body  
        $response->getBody()->write('404 - params not set');

     endif;
   
});