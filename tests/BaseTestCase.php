<?php
namespace Tests\App;

/**
 * Class BaseTestCase
 *
 * @package Tests\App
 */
abstract class BaseTestCase extends \PHPUnit_Framework_TestCase {

	protected function setUp() {
		putenv('CONTEXT=testing');
	}
}
