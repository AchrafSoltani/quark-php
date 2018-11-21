<?php
/**
 * Created by PhpStorm.
 * User: theheretic
 * Email: soltani.achraf@gmail.com
 * Date: 11/21/18
 * Time: 1:38 PM
 */

namespace Quark\Framework\ServiceProvider;

use League\Container\ServiceProvider\AbstractServiceProvider;

class TwigServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
        'twig'
    ];

    public function register()
    {
        $config = $this->getContainer()->get('config')['templating'];
        $basePath = $this->getContainer()->get('base_path');

        $config['environment']['cache'] = $basePath . $config['environment']['cache'];

        $loader = new \Twig_Loader_Filesystem($basePath . $config['loader']);
        $twig = new \Twig_Environment($loader, $config['environment']);

        $this->getContainer()->add('twig', $twig);
    }
}