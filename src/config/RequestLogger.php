<?php 

namespace ApexLegendsTracker\Src\Config;

class RequestLogger {
  
  protected $requestLog;
  protected $logBody = [];
  protected $requestUri;
  protected $requestContentType;
  protected $requestHost;
  protected $requestMethod;

  public function __construct($file) {
    
    if (!is_dir('./../logs')) :
      mkdir('./../logs');
    endif; 

    $this->requestLog = "./../logs/".$file;
    
  }

  private function appendToProfileRequestLogBody($arr = []) {
    foreach ($arr as $arr_item) :
      array_push($this->logBody, $arr_item);
    endforeach;
  }

  private function buildRequestInfo($request) {

    $request_items = [
     $request->getContentType(),
     $request->getMethod(),
     $request->getUri()->getQuery(),
     $request->getUri()->getHost(),
    ];

    $this->appendToProfileRequestLogBody($request_items);

  }

  public function logProfileRequest($request) {

    $this->buildRequestInfo($request);

    $profileParams = [
      $request->getAttribute('platform'),
      $request->getAttribute('profile')
    ];

    $this->appendToProfileRequestLogBody($profileParams);

    file_put_contents($this->requestLog, json_encode($this->logBody).',', FILE_APPEND);

  }

}