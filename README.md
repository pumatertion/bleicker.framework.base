# Please Note #
This software is NOT production ready!
Its just my personal playground currently :)

## Installation ##
* git clone git@bitbucket.org:cbleicker/bleicker.framework.base.git
* cd bleicker.framework.base
* composer install --no-dev
* composer dumpautoload --no-dev -o

### Setup ###
* cp Configuration/Secrets.Example.php Configuration/Secrets.php
* By default a sqlite db is used.
* Run cli command to create the db and build needed tables: vendor/bin/doctrine orm:schema-tool:update --force --dump-sql
* cd Public
* start a php server either in development- or production context
	* Development: php -S localhost:8000
	* Production: CONTEXT=production php -S localhost:8000
* Open your browser and visit http://localhost:8000/

### Switch to MySql ###
If you want to use mysql instead of sqlite adjust the driver f.e. to ['url' => 'mysql://user:secret@localhost/mydb'] in Secrets.php and run vendor/bin/doctrine orm:schema-tool:update --force --dump-sql

### Doctrine Mapping ###
For persistence Doctrine is in use.
By default i am using its yml configuration to bind models and mapping informations.
Simply add your yaml configuration in Configuration/Schema/Persistence/ Folder. And refresh you db using the doctrine command line (vendor/bin/doctrine orm:schema-tool:update --force --dump-sql)

[See Doctrine Docs](http://doctrine-orm.readthedocs.org/en/latest/)

### Routes ###
See Configuration/Routing.php to get some small examples how to introduce new Routes.

[See FastRoute Docs](https://github.com/nikic/FastRoute)

### Templating ###
I introduced namelesscoder's fluid decoupled version as default template engine.
Templates are located in the Folder "Templates" an resolved by the namespace of called Controller::Action.
[See Fluid Docs](https://github.com/NamelessCoder/TYPO3.Fluid)

### Your App Stuff ###
A good location for your Controllers/Services/DomainModels etc is the "App" Folder
