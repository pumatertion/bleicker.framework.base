<?php

define('ROOT_DIRECTORY', __DIR__ . '/..');

use App\Controller\ExampleController;
use Bleicker\Framework\Registry;
use Bleicker\Framework\WebApplication;
use Bleicker\Routing\ControllerRouteData;
use Bleicker\Routing\RouterInterface;
use TYPO3\Fluid\Core\Cache\FluidCacheInterface;
use TYPO3\Fluid\Core\Cache\SimpleFileCache;

include __DIR__ . "/../vendor/autoload.php";

$app = new WebApplication();

/**
 * Generating Application Registry
 *
 * @example Registry::addImplementation(Whatever::class, function () {});
 */

/**
 * Routing Configuration
 *
 * @var RouterInterface $router
 */
$router = Registry::getImplementation(RouterInterface::class);
$router->addRoute('/', 'get', new ControllerRouteData(ExampleController::class, 'indexAction'));
$router->addRoute('/user/{userName}', 'get', new ControllerRouteData(ExampleController::class, 'userAction'));

/**
 * Cache Configurations
 */
if (getenv('CONTEXT') === 'production') {
	Registry::addImplementation(FluidCacheInterface::class, new SimpleFileCache(ROOT_DIRECTORY . '/Cache'));
}

return $app;
