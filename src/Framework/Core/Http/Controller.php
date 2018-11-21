<?php
/**
 * Created by PhpStorm.
 * User: theheretic
 * Email: soltani.achraf@gmail.com
 * Date: 11/20/18
 * Time: 10:53 PM
 */

namespace Quark\Framework\Core\Http;

use Quark\Framework\Application\Application;

class Controller
{
    protected $container;

    public function __construct(Application $container)
    {
        $this->container = $container;
    }

    public function renderView($data = array())
    {
        // TODO : add template not found exception
        $request_path = $this->container->getRequest()->getUri()->getPath();
        $request_path = ltrim($request_path, '/');
        $explode = explode('/', $request_path);
        if(count($explode) == 2)
        {
            $request_path = $explode[0] . '/' . $explode[1] . '/Index';
        }

        return $this->container->get('twig')->render(strtolower($request_path).'.twig', $data);
    }
}