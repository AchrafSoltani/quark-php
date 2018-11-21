<?php
/**
 * Created by PhpStorm.
 * User: theheretic
 * Email: soltani.achraf@gmail.com
 * Date: 11/20/18
 * Time: 10:17 PM
 */

namespace Quark\Framework\Core\Router;


class Route
{
    private $path;
    private $controller;
    private $file;
    private $namespace;

    public function __construct($path, $controller, $file, $namespace)
    {
        $this->path = $path;
        $this->controller = $controller;
        $this->file = $file;
        $this->namespace = $namespace;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path): void
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file): void
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @param mixed $namespace
     */
    public function setNamespace($namespace): void
    {
        $this->namespace = $namespace;
    }
}