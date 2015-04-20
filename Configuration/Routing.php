<?php

use App\Controller\ExampleController;
use Bleicker\Framework\Registry;
use Bleicker\Routing\ControllerRouteData;
use Bleicker\Routing\RouterInterface;

/**
 * Routing Configuration
 *
 * @var RouterInterface $router
 */
$router = Registry::getImplementation(RouterInterface::class);
$router->addRoute('/', 'get', new ControllerRouteData(ExampleController::class, 'indexAction'));
$router->addRoute('/user/{userName}', 'get', new ControllerRouteData(ExampleController::class, 'userAction'));
