<?php
namespace Tests\App;

use Bleicker\Framework\ApplicationInterface;
use Bleicker\ObjectManager\ObjectManager;
use Bleicker\Request\MainRequestInterface;
use Bleicker\Session\Session;
use Bleicker\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Bleicker\Request\RequestInterface;
use Bleicker\Framework\Http\Request;

/**
 * Class UnitTestCase
 *
 * @package Tests\App
 */
abstract class FunctionalTestCase extends BaseTestCase {

	/**
	 * @var ApplicationInterface
	 */
	protected $app;

	protected function setUp() {
		parent::setUp();
		include_once __DIR__ . '/../Bootstrap/Webapplication.php';
		ObjectManager::register(SessionInterface::class, new Session(new MockArraySessionStorage()));
		/** @var Request $request */
		$request = ObjectManager::get(MainRequestInterface::class);
		$request->setSession(ObjectManager::get(SessionInterface::class));
	}
}
