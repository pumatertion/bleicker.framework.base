<?php

use Bleicker\Registry\Registry;

Registry::set('DbConnection', ['driver' => 'pdo_sqlite', 'path' => ROOT_DIRECTORY . '/Private/db.sqlite']);