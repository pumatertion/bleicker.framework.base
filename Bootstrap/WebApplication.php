<?php

use App\Controller\HomeController;
use App\Controller\StandardController;
use Bleicker\Framework\WebApplication;
use Bleicker\Routing\ControllerRouteData;
use Bleicker\Routing\RouterInterface;

include __DIR__ . "/../vendor/autoload.php";

$app = WebApplication::getInstance();

/**
 * Generating Application Registry
 *
 * @example $app->getRegistry()->addImplementation(Whatever::class, function () {});
 */


/**
 * Routing Configuration
 *
 * @var RouterInterface $router
 */
$router = WebApplication::getRegistry()->getImplementation(RouterInterface::class);
$router->addRoute('/', 'get', new ControllerRouteData(HomeController::class, 'indexAction'));
$router->addRoute('/user/{user}', 'get', new ControllerRouteData(StandardController::class, 'indexAction'));

return $app;
