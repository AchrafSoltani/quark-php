<?php
/**
 * Created by PhpStorm.
 * User: theheretic
 * Email: soltani.achraf@gmail.com
 * Date: 11/20/18
 * Time: 10:24 PM
 */

namespace Quark\Framework\Core;


class Container
{
    protected $services;

    public function __construct()
    {
        $this->services = array();
    }

    public function inject($service, $key)
    {
        $this->services[$key] = $service;
    }

    public function get($key)
    {
        return $this->services[$key];
    }

}