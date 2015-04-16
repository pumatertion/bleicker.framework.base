<?php

namespace App\Controller;

use Bleicker\Controller\AbstractController;

/**
 * Class StandardController
 *
 * @package App\Controller
 */
class StandardController extends AbstractController {

	/**
	 * @param string $title
	 * @return void
	 */
	public function indexAction($title) {
		$this->view->assign('title', $title);
	}
}
