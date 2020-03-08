<?php 

namespace ApexLegendsTracker\Src\Config;

class RequestLogger {
  
  protected $requestLog;

  public function __construct($file) {
    if (!is_dir('./../logs')) :
      mkdir('./../logs');
    endif; 
    $this->requestLog = "./../logs/".$file;
  }

  public function LogRequest($data = []) {
    file_put_contents($this->requestLog, json_encode($data).',', FILE_APPEND);
  }

}