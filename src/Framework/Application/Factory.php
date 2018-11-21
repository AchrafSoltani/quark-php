<?php
/**
 * Created by PhpStorm.
 * User: theheretic
 * Email: soltani.achraf@gmail.com
 * Date: 11/21/18
 * Time: 11:41 AM
 */

namespace Quark\Framework\Application;

class Factory
{
    public static function build($basePath)
    {
        return new Application($basePath);
    }

    public static function bootstrap($basePath)
    {
        $config = array();

        $config['templating'] = include $basePath . '/app/config/templating.php';

        return $config;
    }
}