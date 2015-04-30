<?php

use Bleicker\Framework\Context\Context;
use Bleicker\Registry\Registry;
use Bleicker\ObjectManager\ObjectManager;
use Bleicker\Persistence\EntityManager;
use Bleicker\Persistence\EntityManagerInterface;
use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\FilesystemCache as CacheImplementation;
use Doctrine\ORM\Tools\Setup;

ObjectManager::register(Cache::class, function () {
	return new CacheImplementation(ROOT_DIRECTORY . '/Cache/Doctrine');
});

ObjectManager::register(EntityManagerInterface::class, function () {
	return EntityManager::create(
		Registry::get('DbConnection'),
		Setup::createYAMLMetadataConfiguration(array(__DIR__ . "/../App/Schema/Persistence"), !Context::isProduction(), ROOT_DIRECTORY . '/Cache/Proxies', ObjectManager::get(Cache::class))
	);
});
