<?php
/**
 * Created by PhpStorm.
 * User: theheretic
 * Email: soltani.achraf@gmail.com
 * Date: 11/21/18
 * Time: 12:19 PM
 */

namespace Quark\Framework\Core\Response;

use Zend\Diactoros\Response;
use Zend\Diactoros\Request;

interface ResponseInterface
{
    public function run(): void;
}