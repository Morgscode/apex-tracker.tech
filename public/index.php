<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

require __DIR__.'/../vendor/autoload.php';

$app = new \Slim\App(['settings' => $config]);

require '../src/routes/profile.php';

$app->run();