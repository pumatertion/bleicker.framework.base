<?php

define('ROOT_DIRECTORY', __DIR__ . '/..');

use App\Controller\ExampleController;
use Bleicker\Framework\Registry;
use Bleicker\Framework\WebApplication;
use Bleicker\Routing\ControllerRouteData;
use Bleicker\Routing\RouterInterface;

include __DIR__ . "/../vendor/autoload.php";

$app = new WebApplication();

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
$router = Registry::getImplementation(RouterInterface::class);
$router->addRoute('/', 'get', new ControllerRouteData(ExampleController::class, 'indexAction'));
$router->addRoute('/user/{user}', 'get', new ControllerRouteData(ExampleController::class, 'userAction'));

return $app;
