<?php

namespace Src\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{
    public static function createEntityManager(): EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            [__DIR__ . "/.."],
            true
        );

        // $conn = [
        //     'driver' => 'pdo_sqlite',
        //     'path' =>  __DIR__ . '/db.sqlite',
        // ];
        
        $conn = [
            'dbname' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'],
            'host' => $_ENV['DB_HOST'],
            'driver' => $_ENV['DB_DRIVE'] ?? 'pdo_mysql'
        ];

        return EntityManager::create($conn, $config);
    }
}
