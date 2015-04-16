<?php

namespace App\Controller;

use Bleicker\Controller\AbstractController;

/**
 * Class HomeController
 *
 * @package App\Controller
 */
class HomeController extends AbstractController {

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('title', 'Hello World');
	}
}
