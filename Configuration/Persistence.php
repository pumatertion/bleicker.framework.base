<?php

use Bleicker\Framework\Context\Context;
use Bleicker\Framework\Registry;
use Bleicker\Persistence\EntityManager;
use Bleicker\Persistence\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

Registry::addImplementation(EntityManagerInterface::class, EntityManager::create(
	['driver' => 'pdo_sqlite', 'path' => ROOT_DIRECTORY . '/Private/db.sqlite'],
	Setup::createYAMLMetadataConfiguration(array(ROOT_DIRECTORY . "/Configuration/Schema/Persistence"), Context::isDevelopment())
));

\Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(Registry::getImplementation(EntityManagerInterface::class));