<?php

namespace Bleicker\Routing;

/**
 * Class AbstractRouter
 *
 * @package Bleicker\Routing
 */
abstract class AbstractRouter implements RouterInterface {

	/**
	 * @var RouterInterface
	 */
	private static $instance;

	/**
	 * @return RouterInterface
	 */
	public static final function getInstance() {
		if (NULL === self::$instance) {
			self::$instance = new static;
		}
		return self::$instance;
	}

	private final function __construct() {
	}

	private final function __clone() {
	}
}
