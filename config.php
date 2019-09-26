<?php
use GuzzleHttp\Client;
use Guzzle\Http\Exception\ClientErrorResponseException;

const TRACKER_API_KEY = '12c7ec29-39ad-4e1f-a3c8-02e1dd38cc77';
const TRACKER_API_URL = 'https://public-api.tracker.gg/v1/apex/standard/profile/';

const headers = ['TRN-Api-Key' => TRACKER_API_KEY ];

//instantiate guzzle class
     $client = new Client([
        'headers' => ['Content-Type' => 'application/json'],
        // Base URI is used with relative requests
        'base_uri' => TRACKER_API_URL,
        // default request options.
        'timeout'  => 2.0,
    ]);