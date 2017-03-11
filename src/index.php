<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Helper\RoutingHelper;

$routingHelper = new RoutingHelper(
    $_SERVER['REQUEST_URI'],
    $_SERVER['REQUEST_METHOD'],
    'php://input',
    $_SERVER["CONTENT_TYPE"] );

$routingHelper->run();