<?php
/**
 * Created by PhpStorm.
 * User: theheretic
 * Email: soltani.achraf@gmail.com
 * Date: 11/20/18
 * Time: 10:17 PM
 */

namespace Quark\Framework\Core\Router;
use Quark\Framework\Core\Router\Exception\RouteNotFoundException;
use Symfony\Component\Finder\Finder;


class Router
{
    private $routes;

    public function __construct($path)
    {
        $this->routes = array();

        $finder = new Finder();
        $finder->files()->in($path)->name('*Controller.php');

        foreach ($finder as $file)
        {
            $path =  str_replace('Controller.php', '', $file->getRelativePathname());
            $controller = str_replace('.php', '', $file->getFilename());
            $namespace = 'App\\Controller\\'.str_replace('/', '\\', $path).'Controller';
            $this->routes[] = new Route($path, $controller, $file->getRelativePathname(), $namespace);
        }
    }

    /**
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * @param array $routes
     */
    public function setRoutes(array $routes): void
    {
        $this->routes = $routes;
    }

    public function dispatch($request)
    {
        $request_path = $request->getUri()->getPath();
        $request_method = $request->getMethod();

        // TODO : add support for default Index controller without it being part of the request path
        foreach ($this->routes as $route)
        {
            if(strtolower('/'.$route->getPath()) == strtolower($request_path))
            {
                return $route;
            }
        }
        throw new RouteNotFoundException('Error 404', 404);
    }
}