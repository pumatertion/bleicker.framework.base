<?php

use Bleicker\Framework\Context\Production;
use Bleicker\Framework\Registry;
use TYPO3\Fluid\Core\Cache\FluidCacheInterface;
use TYPO3\Fluid\Core\Cache\SimpleFileCache;
use Bleicker\Framework\Context\ContextInterface;

/**
 * Cache Configurations
 */
if (Registry::getImplementation(ContextInterface::class) instanceof Production) {
	Registry::addImplementation(FluidCacheInterface::class, new SimpleFileCache(ROOT_DIRECTORY . '/Cache'));
}
