<?php

use App\Controller\ExampleController;
use App\Security\Token\ParameterToken;
use Bleicker\Authentication\AuthenticationManagerInterface;
use Bleicker\Framework\Security\AccessVoterInterface;
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
	/** @var AuthenticationManagerInterface $authenticationManager */
	$authenticationManager = ObjectManager::get(AuthenticationManagerInterface::class);
	call_user_func_array(array($authenticationManager, 'run'), $methodArguments);

	if ($authenticationManager->getTokenManager()->getPrototypeToken(ParameterToken::class)->getStatus() !== ParameterToken::AUTHENTICATION_SUCCESS) {
		throw new AccessDeniedException('Wrong accessKey given', 1429795543);
	}
}, ExampleController::class . '::accessRestrictedAction'));
