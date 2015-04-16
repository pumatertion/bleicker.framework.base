<?php

namespace Bleicker\Routing;

/**
 * Class ControllerRouteDataInterface
 *
 * @package Bleicker\Routing
 */
interface ControllerRouteDataInterface extends RouteDataInterface {

	/**
	 * @param string $controller
	 * @return $this
	 */
	public function setController($controller);

	/**
	 * @param string $method
	 * @return $this
	 */
	public function setMethod($method);

	/**
	 * @return string
	 */
	public function getController();

	/**
	 * @return string
	 */
	public function getMethod();

}
