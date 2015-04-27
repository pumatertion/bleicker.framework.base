# Please Note #

This software is NOT production ready!
Its just my personal playground currently :)

## Installation ##

Via composer create-project

	composer create-project bleicker/framework-base

### Setup ###

Sql Settings

	cp Configuration/Secrets.Example.php Configuration/Secrets.php

Run cli command to create the db and build needed tables:

	vendor/bin/doctrine orm:schema-tool:update --force --dump-sql

### Start a php server process either in development- or production context ###

Production:

	CONTEXT=production nohup php -S localhost:8001 -t Public >> /dev/null 2>&1 &

Development:

	nohup php -S localhost:8000 -t Public >> /dev/null 2>&1 &

Open your browser and visit either [Development-Server](http://localhost:8000/) or [Production-Server](http://localhost:8001/)

### Switch to MySql ###

If you want to use mysql instead of sqlite adjust the driver in Secrets.php f.e. to

	['url' => 'mysql://user:secret@localhost/mydb']

And run

	vendor/bin/doctrine orm:schema-tool:update --force --dump-sql

### Doctrine Mapping ###

For persistence Doctrine is in use.
By default i am using its yml configuration to bind models and mapping informations.
Simply add your yaml configuration in Configuration/Schema/Persistence/ Folder. And refresh you db using the doctrine command line

	vendor/bin/doctrine orm:schema-tool:update --force --dump-sql

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

Add something:

	Registry::add('foo.bar.baz', 'Hello World');

Getting Registry entry everywhere in your code

	Registry::get('foo.bar.baz');

#### ObjectManager ####

Add Object

	ObjectManager::register(MyClassInterface::class, new MyClass('foo', 'bar'));

Getting the Object everywhere in your Code with

	ObjectManager::get(MyClassInterface::class);

##### Registering a Closure as Factory #####

Add Closure

	ObjectManager::register(MyClassInterface::class, function(){new MyClass()});

To make it a singleton just register it as this:

	ObjectManager::makeSingleton(MyClassInterface::class);

Getting the Object everywhere in your Code with

	ObjectManager::get(MyClassInterface::class);

### TypeConverter ###
TypeConverter can be used to convert some source to a defined target type.

Register a TypeConverter

	Converter::register('registrationFormDto', new RegistrationFormDtoConverter());

Convert a source

	Converter::convert($postData, RegistrationFormDtoConverter::class);

#### Controller Security ###

To secure a Controller::Action you can add a Vote to the AccessVoter Object.
The Vote receives a Closure wich could be anything you want. The arguments
of the Controller will be passed to this closure. So if you need them, use them.
[See this example](https://github.com/pumatertion/bleicker.framework.base/blob/master/Configuration/ControllerSecurity.php)
