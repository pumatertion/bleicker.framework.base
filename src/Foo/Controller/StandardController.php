<?php

namespace Foo\Controller;
use Bleicker\Request\Http\Request;

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
		/** @var Request $httpRequest */
		$httpRequest = $this->request->getMainRequest();
		$title = $httpRequest->query->has('title') ? $httpRequest->query->get('title') : 'Hello World';
		$this->view->assign('title', $title);
	}
}
