<?php

namespace Tests\App\Functional;

use App\Controller\ExampleController;
use Bleicker\Framework\Security\AccessVoterInterface;
use Bleicker\Framework\Utility\ObjectManager;
use Tests\App\UnitTestCase;
use Bleicker\Framework\ApplicationInterface;

/**
 * Class ControllerAccessTest
 *
 * @package Tests\App\Functional
 */
class ControllerAccessTest extends UnitTestCase {

	/**
	 * @var AccessVoterInterface
	 */
	protected $accessVoter;

	/**
	 * @var ApplicationInterface
	 */
	protected $app;

	protected function setUp() {
		parent::setUp();
		include_once __DIR__ . '/../../Bootstrap/Webapplication.php';
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
