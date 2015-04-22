<?php

use Bleicker\Framework\Context\Context;
use Bleicker\Framework\Registry;
use Bleicker\Framework\Utility\ObjectManager;
use Bleicker\Persistence\EntityManager;
use Bleicker\Persistence\EntityManagerInterface;
use Doctrine\Common\Cache\Cache;
use Doctrine\ORM\Tools\Setup;
use Doctrine\Common\Cache\FilesystemCache as CacheImplementation;

Registry::addImplementation(Cache::class, function(){
	return new CacheImplementation(ROOT_DIRECTORY.'/Cache/Doctrine');
});

Registry::addImplementation(EntityManagerInterface::class, function(){
	return EntityManager::create(
		Registry::get('DbConnection'),
		Setup::createYAMLMetadataConfiguration(array(__DIR__ . "/Schema/Persistence"), !Context::isProduction(), ROOT_DIRECTORY.'/Cache/Proxies', ObjectManager::get(Cache::class))
	);
});
