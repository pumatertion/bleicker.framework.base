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
	 * @return string
	 */
	public function indexAction($title) {
		return $this->view->assign('title', $title)->render();
	}
}
