<?php

namespace Bleicker\Routing;

/**
 * Class ControllerRouteData
 *
 * @package Bleicker\Routing
 */
class ControllerRouteData implements ControllerRouteDataInterface {

	/**
	 * @var string
	 */
	protected $controller;

	/**
	 * @var string
	 */
	protected $method;

	/**
	 * @param string $controller
	 * @param string $method
	 */
	public function __construct($controller, $method) {
		$this->controller = $controller;
		$this->method = $method;
	}

	/**
	 * @param string $controller
	 * @return $this
	 */
	public function setController($controller = NULL) {
		$this->controller = $controller;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getController() {
		return $this->controller;
	}

	/**
	 * @param string $method
	 * @return $this
	 */
	public function setMethod($method = NULL) {
		$this->method = $method;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMethod() {
		return $this->method;
	}
}
