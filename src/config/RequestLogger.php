<?php 

namespace ApexLegendsTracker\Src\Config;

class RequestLogger {
  
  protected $requestLogUrl;
  protected $profileRequestLogs;
  protected $requestTestLogUrl; 
  protected $newLogBody = [];
  protected $requestItems = [];
  protected $profileParams = [];
  protected $requestUri;
  protected $requestContentType;
  protected $requestHost;
  protected $requestMethod;

  public function __construct($file) {
    
    if (!is_dir('./../logs')) :
      mkdir('./../logs');
    endif; 

    $this->requestLogUrl = "./../logs/".$file;
    $this->requestTestLogUrl = "./../logs/test.json"; 
  }

  private function buildRequestLog($request) {

    $this->requestItems = [
        'Request Date' => date('d/m/Y'),
        'Request Method' => $request->getMethod(),
        'Content-Type' => $request->getContentType(),
        'Host' => $request->getUri()->getHost()
    ];
  }

  private function testRequestLog() {

    unset($this->profileRequestLogs);

    $this->profileRequestLogs = json_decode(file_get_contents($this->requestLogUrl));
    
    $log = $this->profileRequestLogs;

    file_put_contents($this->requestTestLogUrl, json_encode($log));
  }

  private function buildProfileRequestLog($request) {

    unset($this->newLogBody);

    $this->buildRequestLog($request);

    $this->profileParams = [
        'Platform' => $request->getAttribute('platform'),
        'Gamertag' => $request->getAttribute('profile')
    ];

    $log = array_merge($this->requestItems, $this->profileParams);

    array_push($this->newLogBody, $log);
  }

  public function logProfileRequest($request) {

    $this->buildProfileRequestLog($request);

    file_put_contents($this->requestLogUrl, json_encode($this->newLogBody), FILE_APPEND);

    $this->testRequestLog();
  }

}