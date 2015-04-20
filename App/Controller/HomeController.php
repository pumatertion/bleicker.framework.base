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
	 * @return string
	 */
	public function indexAction() {
		return $this->view->assign('title', 'Hello World')->render();
	}
}
