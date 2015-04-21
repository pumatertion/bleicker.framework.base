<?php

use Bleicker\Framework\Context\Context;
use Bleicker\Framework\Registry;
use Bleicker\Persistence\EntityManager;
use Bleicker\Persistence\EntityManagerInterface;
use Doctrine\Common\Cache\Cache;
use Doctrine\ORM\Tools\Setup;
use Doctrine\Common\Cache\FilesystemCache as CacheImplementation;

Registry::add(Cache::class, new CacheImplementation(ROOT_DIRECTORY.'/Cache/Doctrine'));

Registry::addImplementation(EntityManagerInterface::class, EntityManager::create(
	Registry::get('DbConnection'),
	Setup::createYAMLMetadataConfiguration(array(__DIR__ . "/Schema/Persistence"), Context::isDevelopment(), NULL, Registry::get(Cache::class))
));

$isDev = Context::isDevelopment();

\Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(Registry::getImplementation(EntityManagerInterface::class));