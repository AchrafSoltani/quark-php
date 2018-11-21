<?php
/**
 * Created by PhpStorm.
 * User: theheretic
 * Email: soltani.achraf@gmail.com
 * Date: 11/20/18
 * Time: 10:53 PM
 */

namespace Quark\Framework\Core\Http;

use Quark\Framework\Core\Container;

class Controller
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

}