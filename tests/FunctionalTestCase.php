<?php
namespace Tests\App;

use Bleicker\Framework\ApplicationInterface;

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
	}
}
