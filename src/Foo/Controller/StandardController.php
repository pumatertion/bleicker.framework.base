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
	 * @param string $title
	 * @return void
	 */
	public function indexAction($title) {
		$this->view->assign('title', $title);
	}

	/**
	 * @param string $title
	 * @return void
	 */
	public function anotherAction($title) {
		$this->view->assign('title', $title . ' of another Action');
	}
}
