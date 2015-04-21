<?php

use App\Controller\ExampleController;
use Bleicker\Framework\Registry;
use Bleicker\Routing\ControllerRouteData;
use Bleicker\Routing\RouterInterface;

Registry::getImplementation(RouterInterface::class)
	->addRoute('/', 'get', new ControllerRouteData(ExampleController::class, 'indexAction'))
	->addRoute('/example/add', 'get', new ControllerRouteData(ExampleController::class, 'addExampleAction'))
	->addRoute('/example/{id}', 'get', new ControllerRouteData(ExampleController::class, 'getExampleAction'));
