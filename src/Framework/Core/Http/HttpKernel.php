<?php
/**
 * Created by PhpStorm.
 * User: theheretic
 * Email: soltani.achraf@gmail.com
 * Date: 11/20/18
 * Time: 10:02 PM
 */

namespace Quark\Framework\Core\Http;

use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\ServerRequestFactory;

class HttpKernel
{
    protected $request;
    protected $router;
    protected $container;
    protected $basepath;

    public function __construct($basepath)
    {
        $this->request = ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
        );

        $this->basepath = $basepath.'/app/Controller/';
    }

    /**
     * @return \Zend\Diactoros\ServerRequest
     */
    public function getRequest(): \Zend\Diactoros\ServerRequest
    {
        return $this->request;
    }

    /**
     * @return mixed
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @param mixed $router
     */
    public function setRouter($router): void
    {
        $this->router = $router;
    }

    /**
     * @return mixed
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param mixed $container
     */
    public function setContainer($container): void
    {
        $this->container = $container;
    }

    public function run()
    {
        $route = $this->getRouter()->dispatch($this->request);
        require_once $this->basepath.$route->getFile();
        $ctrl = $route->getController();
        $controller = new $ctrl($this->container);
        $htmlContent = $controller->execute();
        $response = new HtmlResponse($htmlContent, 200, [ 'Content-Type' => ['application/xhtml+xml']]);

        ob_start();
        echo $response->getBody()->getContents();
        ob_end_flush();
    }
}