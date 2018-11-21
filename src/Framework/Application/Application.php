<?php
/**
 * Created by PhpStorm.
 * User: theheretic
 * Email: soltani.achraf@gmail.com
 * Date: 11/21/18
 * Time: 11:58 AM
 */

namespace Quark\Framework\Application;

use League\Container\Container;
use Quark\Framework\Core\Http\KernelInterface;
use Quark\Framework\Core\Router\Exception\RouteNotFoundException;
use Quark\Framework\Core\Router\Router;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response\HtmlResponse;

class Application extends Container implements KernelInterface
{
    private $basePath;
    private $request;

    public function __construct($path)
    {
        parent::__construct();

        $this->basePath = $path;

        $this->request = ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
        );

        $this->add(Router::class)->addArgument($this->basePath.'/app/Controller/');
    }

    public function getRequest(): ServerRequest
    {
        return $this->request;
    }

    public function getRouter(): Router
    {
        return $this->get(Router::class);
    }

    public function handleRequest() : void
    {
        try
        {
            $route = $this->getRouter()->dispatch($this->request);
            $class = $route->getNamespace();
            $controller = new $class($this);
            $htmlContent = $controller->execute();
            $response = new HtmlResponse($htmlContent, 200, [ 'Content-Type' => ['application/xhtml+xml']]);
            ob_start();
            echo $response->getBody()->getContents();
            ob_end_flush();
        }
        catch (RouteNotFoundException $e)
        {
            echo $e;
        }

    }
}