<?php

namespace ApexLegendsTracker\Src\Config;

class RequestConfigurations {
  public static $TRACKER_API_KEY;
  public static $TRACKER_API_URL;

  public static function setupAuth() {
    self::$TRACKER_API_KEY = "12c7ec29-39ad-4e1f-a3c8-02e1dd38cc77";
  }

  public static function defineApiUrl() {
    self::$TRACKER_API_URL = "https://public-api.tracker.gg/v1/apex/standard/profile/";
  }

}






   