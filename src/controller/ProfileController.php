<?php 

namespace ApexLegendsTracker\Src\Controller;
use ApexLegendsTracker\Src\Config\RequestConfigurations as RequestConfigurations;
use GuzzleHttp\Client as Client;

class ProfileController {

  protected $client;
  static $profileData;

  public function __construct() {

    //Define endpoint for this instance of client
    RequestConfigurations::defineApiUrl();
    
    //Define the client for this request
    $this->client = new Client([
      'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'
  ],
      // Base URI is used with relative requests
      'base_uri' =>  RequestConfigurations::$TRACKER_API_URL,
      // default request options.
      'timeout'  => 2.0,
  ]);

  }

  public function getProfile($platform, $gamertag) {
     //check if params are set
     if (isset($platform) && isset($gamertag)) {

      // set api key for request
      RequestConfigurations::setupAuth();

      $headers = ['TRN-Api-Key' => RequestConfigurations::$TRACKER_API_KEY ];
      
      try {
          //store guzzle resonse response
          $gResponse = $this->client->get($platform.'/'.$gamertag, ['headers' => $headers
          ]);

          self::$profileData = $gResponse->getBody();
    
      } catch (\Throwable $th) {
          //set the response body
          $responseBody = $th->getResponse()->getBody(true);

          return $responseBody;
      }

    }
  }
}