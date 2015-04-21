<?php

namespace App\Domain\Model;

/**
 * Class Example
 *
 * @package App\Domain\Model
 */
class Example {

	/**
	 * @var integer
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $name;

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}
}
