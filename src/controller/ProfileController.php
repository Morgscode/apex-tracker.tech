<?php 

require __DIR__.'/../../config.php';

class ProfileController {

  public $client;
  static $profileData;

  public function __construct() {
    $this->client = new GuzzleHttp\Client([
      'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'
  ],
      // Base URI is used with relative requests
      'base_uri' => TRACKER_API_URL,
      // default request options.
      'timeout'  => 2.0,
  ]);
  }

  public function getProfile($platform, $gamertag) {
     //check if params are set
     if (isset($platform) && isset($gamertag)) {
        
      try {
          //store guzzle resonse response
          $gResponse = $this->client->get($platform.'/'.$gamertag, ['headers' => headers
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