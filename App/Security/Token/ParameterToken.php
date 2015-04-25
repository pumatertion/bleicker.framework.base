<?php

namespace App\Security\Token;

use Bleicker\Framework\Utility\Arrays;
use Bleicker\Token\AbstractPrototypeToken;

/**
 * Class ParameterToken
 *
 * @package App\Security\Token
 */
class ParameterToken extends AbstractPrototypeToken {

	/**
	 * @return $this
	 */
	public function authenticate() {

		if ($this->getStatus() === self::AUTHENTICATION_SUCCESS || $this->getStatus() !== self::AUTHENTICATION_REQUIRED) {
			return $this;
		}

		if ($this->getCredentials() === 'foo') {
			$this->status = self::AUTHENTICATION_SUCCESS;
			return $this;
		}

		$this->status = self::AUTHENTICATION_FAILED;

		return $this;
	}

	/**
	 * @return $this
	 */
	public function injectCredentialsAndSetStatus() {
		$arguments = func_get_args();
		$this->credentials = Arrays::getValueByPath($arguments, '0.accessKey');
		$this->status = self::AUTHENTICATION_REQUIRED;
		return $this;
	}
}
