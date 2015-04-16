<?php

/** @ToDo Introduce Bootsraping and Context */

use App\Controller\HomeController;
use App\Controller\StandardController;
use Bleicker\FastRouter\Router;
use Bleicker\Request\Http\Handler;
use Bleicker\Request\Http\Request;
use Bleicker\Response\Http\Response;
use Bleicker\Routing\ControllerRouteData;
use FastRoute\Dispatcher;

include __DIR__ . "/../vendor/autoload.php";

$router = Router::getInstance();
$router->addRoute('/user/{user}', 'get', new ControllerRouteData(StandardController::class, 'indexAction'));
$router->addRoute('/', 'get', new ControllerRouteData(HomeController::class, 'indexAction'));

$request = Request::createFromGlobals();
$response = new Response();

$handler = new Handler($request, $response);
$handler->handle();

$response->send();