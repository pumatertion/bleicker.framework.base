<?php

namespace App\Controller;

use Bleicker\Controller\AbstractController;

/**
 * Class ExampleController
 *
 * @package App\Controller
 */
class ExampleController extends AbstractController {

	/**
	 * @return string
	 */
	public function indexAction() {
		return $this->view->assign('title', 'Hello World')->render();
	}

	/**
	 * @param string $userName
	 * @return string
	 */
	public function userAction($userName) {
		return $this->view->assign('userName', $userName)->render();
	}
}
