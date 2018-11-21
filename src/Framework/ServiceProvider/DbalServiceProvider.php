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
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

class DbalServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
        'dbal'
    ];

    public function register()
    {
        $connectionParams = $this->getContainer()->get('config')['database'];
        $basePath = $this->getContainer()->get('base_path');

        $config = new Configuration();

        if($connectionParams['driver'] == 'pdo_sqlite')
            $connectionParams['path'] = $basePath . '/app/var/data/' . $connectionParams['dbname'];

        $db = DriverManager::getConnection($connectionParams, $config);

        $this->getContainer()->add('dbal', $db);
    }
}