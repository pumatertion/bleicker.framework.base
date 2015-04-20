<?php

use Bleicker\Framework\Registry;
use TYPO3\Fluid\Core\Cache\FluidCacheInterface;
use TYPO3\Fluid\Core\Cache\SimpleFileCache;

/**
 * Cache Configurations
 */
if (Registry::get('CONTEXT') === 'production') {
	Registry::addImplementation(FluidCacheInterface::class, new SimpleFileCache(ROOT_DIRECTORY . '/Cache'));
}
