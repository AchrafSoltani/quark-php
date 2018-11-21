<?php
/**
 * Created by PhpStorm.
 * User: theheretic
 * Email: soltani.achraf@gmail.com
 * Date: 11/21/18
 * Time: 12:49 PM
 */

namespace Quark\Framework\Core\Http;

use Quark\Framework\Core\Router\Router;
use Zend\Diactoros\ServerRequest;

interface KernelInterface
{
    public function getRequest(): ServerRequest;
    public function getRouter() : Router;
    public function handleRequest(): void;
}