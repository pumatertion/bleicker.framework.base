<?php

use Bleicker\Registry\Registry;

Registry::add('DbConnection', ['driver' => 'pdo_sqlite', 'path' => ROOT_DIRECTORY . '/Private/db.sqlite']);