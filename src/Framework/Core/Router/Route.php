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
    private $namespace;
    private $package;
    private $module;
    private $action;

    public function __construct($namespace, $package, $module, $action)
    {
        $this->namespace = $namespace;
        $this->package = $package;
        $this->module = $module;
        $this->action = $action;
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

    /**
     * @return mixed
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * @param mixed $package
     */
    public function setPackage($package): void
    {
        $this->package = $package;
    }

    /**
     * @return mixed
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @param string $module
     */
    public function setModule($module): void
    {
        $this->module = $module;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action): void
    {
        $this->action = $action;
    }

    public function getPath()
    {
        return $this->package . '/' . $this->module . '/' . $this->action;
    }
}