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

#### Registry ####
* Registry::add('foo.bar.baz', 'Hello World');
* Getting Registry entry everywhere in your code with Registry::get('foo.bar.baz');

#### ObjectManager ####
* ObjectManager::register(MyClassInterface::class, new MyClass('foo', 'bar'));
* Getting the Object everywhere in your Code with ObjectManager::get(MyClassInterface::class);

##### Registering as Closure as Factory with ObjectManager #####
* ObjectManager::register(MyClassInterface::class, function(){new MyClass()});
* To make it a singleton just register it as this: ObjectManager::makeSingleton(MyClassInterface::class);
* Getting the Object everywhere in your Code with ObjectManager::get(MyClassInterface::class);

#### Access Security ###
To secure a Controller::Action you can add a Vote to the AccessVoter Object.
The Vote receives a Closure wich could be anything you want. The arguments
of the Controller will be passed to this closure. So if you need them, use them.
[See this example](https://bitbucket.org/cbleicker/bleicker.framework.base/src/fb1af267310433c91e451b7573e249439142bca1/Configuration/ControllerSecurity.php?at=master)
