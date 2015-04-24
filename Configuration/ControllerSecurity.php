<?php

use App\Controller\ExampleController;
use Bleicker\Framework\Security\AccessVoterInterface;
use Bleicker\Framework\Utility\Arrays;
use Bleicker\ObjectManager\ObjectManager;
use Bleicker\Security\Exception\AccessDeniedException;
use Bleicker\Security\Vote;

/** @var AccessVoterInterface $accessVoter */
$accessVoter = ObjectManager::get(AccessVoterInterface::class);

/**
 * Deny access to controller method ExampleController::accessRestrictedAction
 * if argument does not match "foo".
 */
$accessVoter->addVote(new Vote(function (array $methodArguments = array()) {
	$accessKey = Arrays::getValueByPath($methodArguments, '0.accessKey');
	if ($accessKey !== 'foo') {
		throw new AccessDeniedException('Wrong accessKey given', 1429795543);
	}
}, ExampleController::class . '::accessRestrictedAction'));
