<?php

namespace App\Controller;

use App\Domain\Model\Example;
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
	 * @return string
	 */
	public function addExampleAction() {
		$example = new Example();
		$example->setName(uniqid('Foo'));
		$this->entityManager->persist($example);
		$this->entityManager->flush();
		return $this->view->assignMultiple(['id' => $example->getId(), 'name' => $example->getName()])->render();
	}

	/**
	 * @param integer $id
	 * @return string
	 */
	public function getExampleAction($id) {
		$example = $this->entityManager->find(Example::class, (integer)$id);
		return $this->view->assignMultiple(['id' => $example->getId(), 'name' => $example->getName()])->render();
	}

	/**
	 * @param string $accessKey
	 * @return string
	 */
	public function accessRestrictedAction($accessKey){
		return $this->view->assign('accessKey', $accessKey)->render();
	}
}
