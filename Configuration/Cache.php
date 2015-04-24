<?php

use Bleicker\Framework\Context\Context;
use Bleicker\ObjectManager\ObjectManager;
use TYPO3\Fluid\Core\Cache\FluidCacheInterface;
use TYPO3\Fluid\Core\Cache\SimpleFileCache;

/**
 * Cache Configurations
 */
if (Context::isProduction()) {
	ObjectManager::register(FluidCacheInterface::class, new SimpleFileCache(ROOT_DIRECTORY . '/Cache'));
}
