<?php

use Bleicker\Framework\WebApplication;

include __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/../Configuration/Constants.php';
include __DIR__ . '/../Configuration/Context.php';

$app = new WebApplication();

include __DIR__ . '/../Configuration/Routing.php';
include __DIR__ . '/../Configuration/Cache.php';
include __DIR__ . '/../Configuration/Persistence.php';

