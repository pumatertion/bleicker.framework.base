<?php

use Bleicker\Framework\Registry;
use Bleicker\Persistence\EntityManagerInterface;

include __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/../Configuration/Constants.php';
include __DIR__ . '/../Configuration/Persistence.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(Registry::getImplementation(EntityManagerInterface::class));