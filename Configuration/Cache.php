<?php

use Bleicker\Framework\Context\Context;
use Bleicker\Framework\Registry;
use TYPO3\Fluid\Core\Cache\FluidCacheInterface;
use TYPO3\Fluid\Core\Cache\SimpleFileCache;

/**
 * Cache Configurations
 */
if (Context::isProduction()) {
	Registry::addImplementation(FluidCacheInterface::class, new SimpleFileCache(ROOT_DIRECTORY . '/Cache'));
}
