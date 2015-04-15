<?php

namespace Bleicker\Controller;

use Bleicker\Request\RequestInterface;
use Bleicker\Response\ResponseInterface;
use Bleicker\View\ViewInterface;
use Bleicker\View\ViewResolverInterface;

/**
 * Class AbstractController
 *
 * @package Bleicker\Controller
 */
abstract class AbstractController implements ControllerInterface {

	/**
	 * @var RequestInterface
	 */
	protected $request;

	/**
	 * @var ResponseInterface
	 */
	protected $response;

	/**
	 * @var ViewResolverInterface
	 */
	protected $viewResolver;

	/**
	 * @var ViewInterface
	 */
	protected $view;

	/**
	 * @return $this
	 */
	public function initialize(){
		$this->setView($this->viewResolver->resolve());
		return $this;
	}

	/**
	 * @param ViewResolverInterface $viewResolver
	 * @return $this
	 */
	public function setViewResolver(ViewResolverInterface $viewResolver) {
		$this->viewResolver = $viewResolver;
		return $this;
	}

	/**
	 * @return ViewResolverInterface
	 */
	public function getViewResolver() {
		return $this->viewResolver;
	}

	/**
	 * @return ViewInterface
	 */
	public function getView() {
		return $this->view;
	}

	/**
	 * @param ViewInterface $view
	 * @return $this
	 */
	public function setView(ViewInterface $view) {
		$this->view = $view;
		return $this;
	}

	/**
	 * @param RequestInterface $request
	 * @return $this
	 */
	public function setRequest(RequestInterface $request) {
		$this->request = $request;
		return $this;
	}

	/**
	 * @return RequestInterface
	 */
	public function getRequest() {
		return $this->request;
	}

	/**
	 * @param ResponseInterface $response
	 * @return $this
	 */
	public function setResponse(ResponseInterface $response) {
		$this->response = $response;
		return $this;
	}

	/**
	 * @return ResponseInterface
	 */
	public function getResponse() {
		return $this->response;
	}
}
