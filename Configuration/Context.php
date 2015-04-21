<?php

use Bleicker\Framework\Registry;
use Bleicker\Framework\Context\ContextInterface;
use Bleicker\Framework\Context\Production;
use Bleicker\Framework\Context\Development;

if(getenv('CONTEXT') === 'production'){
	Registry::addImplementation(ContextInterface::class, new Production());
}else{
	Registry::addImplementation(ContextInterface::class, new Development());
}
