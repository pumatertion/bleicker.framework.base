<?php

use App\Controller\ExampleController;
use Bleicker\Framework\Registry;
use Bleicker\Routing\ControllerRouteData;
use Bleicker\Routing\RouterInterface;

Registry::getImplementation(RouterInterface::class)
	->addRoute('/', 'get', new ControllerRouteData(ExampleController::class, 'indexAction'))
	->addRoute('/user/{userName}', 'get', new ControllerRouteData(ExampleController::class, 'userAction'));
