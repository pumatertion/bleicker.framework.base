<?php

namespace Bleicker\Request\Http;

use Bleicker\Request\ApplicationRequest;
use Bleicker\Request\HandlerInterface;
use Bleicker\Request\MainRequestInterface;
use Bleicker\Response\ApplicationResponse;
use Bleicker\Response\MainResponseInterface;
use Bleicker\View\ViewResolver;
use Bleicker\View\ViewResolverInterface;
use Foo\Controller\StandardController;

/**
 * Class Handler
 *
 * @package Bleicker\Request\Http
 */
class Handler implements HandlerInterface {

	/**
	 * @var MainRequestInterface
	 */
	protected $request;

	/**
	 * @var MainResponseInterface
	 */
	protected $response;

	/**
	 * @var ViewResolverInterface
	 */
	protected $viewResolver;

	/**
	 * @param MainRequestInterface $request
	 * @param MainResponseInterface $response
	 */
	public function __construct(MainRequestInterface $request, MainResponseInterface $response) {
		$this->viewResolver = new ViewResolver();
		$this->viewResolver->setRequest($request);
		$this->request = new ApplicationRequest($request);
		$this->response = new ApplicationResponse($response);
	}

	/**
	 * @return $this
	 * @todo routing
	 */
	public function handle() {
		$controller = new StandardController();
		$controller
			->setRequest($this->request)
			->setResponse($this->response)
			->setViewResolver($this->viewResolver)
			->setView($controller->getViewResolver()->resolve())
			->initialize();
		$content = $controller->indexAction();
		if ($content === NULL) {
			$content = $controller->getView()->render();
		}

		$this->response->getMainResponse()->setContent($content);
	}
}
