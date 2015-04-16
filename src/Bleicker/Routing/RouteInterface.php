<?php

namespace Bleicker\Routing;

/**
 * Class RouteInterface
 *
 * @package Bleicker\Routing
 */
interface RouteInterface {

	/**
	 * @return string
	 */
	public function getMethod();

	/**
	 * @param string $method
	 * @return $this
	 */
	public function setMethod($method);

	/**
	 * @return string
	 */
	public function getPattern();

	/**
	 * @param string $pattern
	 * @return $this
	 */
	public function setPattern($pattern);

	/**
	 * @param RouteDataInterface $data
	 * @return $this
	 */
	public function setData(RouteDataInterface $data);

	/**
	 * @return RouteDataInterface
	 */
	public function getData();
}
