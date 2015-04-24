<?php

namespace Tests\App\Functional;

use App\Controller\ExampleController;
use Bleicker\Framework\Security\AccessVoterInterface;
use Bleicker\ObjectManager\ObjectManager;
use Tests\App\FunctionalTestCase;

/**
 * Class ControllerAccessTest
 *
 * @package Tests\App\Functional
 */
class ControllerAccessTest extends FunctionalTestCase {

	/**
	 * @var AccessVoterInterface
	 */
	protected $accessVoter;

	protected function setUp() {
		parent::setUp();
		$this->accessVoter = ObjectManager::get(AccessVoterInterface::class);
	}

	/**
	 * @test
	 * @expectedException \Bleicker\Security\Exception\AccessDeniedException
	 */
	public function exampleControllerMethodDenied() {
		$this->accessVoter->vote(ExampleController::class . '::accessRestrictedAction', function () {
		}, array('accessKey' => 'bar'));
	}

	/**
	 * @test
	 */
	public function exampleControllerMethodAllowed() {
		$this->accessVoter->vote(ExampleController::class . '::accessRestrictedAction', function () {
			$this->assertTrue(TRUE);
		}, array('accessKey' => 'foo'));
	}
}
