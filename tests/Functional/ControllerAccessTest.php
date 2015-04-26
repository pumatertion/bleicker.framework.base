<?php

namespace Tests\App\Functional;

use App\Controller\ExampleController;
use Bleicker\Framework\Security\AccessVoter;
use Bleicker\ObjectManager\ObjectManager;
use Tests\App\FunctionalTestCase;

/**
 * Class ControllerAccessTest
 *
 * @package Tests\App\Functional
 */
class ControllerAccessTest extends FunctionalTestCase {

	/**
	 * @test
	 * @expectedException \Bleicker\Security\Exception\AccessDeniedException
	 */
	public function exampleControllerMethodDenied() {
		AccessVoter::vote(ExampleController::class . '::accessRestrictedAction', function () {
		}, array('accessKey' => 'bar'));
	}

	/**
	 * @test
	 */
	public function exampleControllerMethodAllowed() {
		AccessVoter::vote(ExampleController::class . '::accessRestrictedAction', function () {
			$this->assertTrue(TRUE);
		}, array('accessKey' => 'foo'));
	}
}
