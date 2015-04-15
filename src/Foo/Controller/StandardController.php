<?php

namespace Foo\Controller;

use Bleicker\Controller\AbstractController;

/**
 * Class StandardController
 *
 * @package Foo\Controller
 */
class StandardController extends AbstractController {

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('title', 'Hello World');
	}
}
