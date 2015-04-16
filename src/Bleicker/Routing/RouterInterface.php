<?php

namespace Bleicker\Routing;

/**
 * Class Router
 *
 * @package Bleicker\Routing
 */
interface RouterInterface {

	const NOT_FOUND = 0;

	const FOUND = 1;

	const METHOD_NOT_ALLOWED = 2;

	/**
	 * @param string $pattern
	 * @param string $method
	 * @param RouteDataInterface $data
	 * @return $this
	 */
	public function addRoute($pattern, $method, RouteDataInterface $data);

	/**
	 * @param string $uri
	 * @param string $method
	 * @return array
	 */
	public function dispatch($uri, $method = 'get');

	/**
	 * @return RouterInterface
	 */
	public static function getInstance();

}
