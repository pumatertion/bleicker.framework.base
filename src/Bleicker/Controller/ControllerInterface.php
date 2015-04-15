<?php

namespace Bleicker\Controller;

use Bleicker\Request\RequestInterface;
use Bleicker\Response\ResponseInterface;
use Bleicker\View\ViewInterface;
use Bleicker\View\ViewResolverInterface;

/**
 * Interface ControllerInterface
 *
 * @package Bleicker\Controller
 */
interface ControllerInterface {

	/**
	 * @return $this
	 */
	public function initialize();

	/**
	 * @param ViewResolverInterface $viewResolver
	 * @return $this
	 */
	public function setViewResolver(ViewResolverInterface $viewResolver);

	/**
	 * @return ViewResolverInterface
	 */
	public function getViewResolver();

	/**
	 * @return ViewInterface
	 */
	public function getView();

	/**
	 * @param ViewInterface $view
	 * @return $this
	 */
	public function setView(ViewInterface $view);

	/**
	 * @param RequestInterface $request
	 * @return $this
	 */
	public function setRequest(RequestInterface $request);

	/**
	 * @return RequestInterface
	 */
	public function getRequest();

	/**
	 * @param ResponseInterface $response
	 * @return $this
	 */
	public function setResponse(ResponseInterface $response);

	/**
	 * @return ResponseInterface
	 */
	public function getResponse();
}
