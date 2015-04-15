<?php

use Bleicker\Request\Http\Handler;
use Bleicker\Request\Http\Request;
use Bleicker\Response\Http\Response;

require_once __DIR__ . "/../vendor/autoload.php";

$request = Request::createFromGlobals();
$response = new Response();
$handler = new Handler($request, $response);
$handler->handle();
$response->send();
