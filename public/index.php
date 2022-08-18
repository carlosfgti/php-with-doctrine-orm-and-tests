<?php

declare(strict_types = 1);

require_once __DIR__ . '/../bootstrap/bootstrap.php';

use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Src\Entities\Course;

$paths = [__DIR__."/../Entities"];
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = ORMSetup::createAnnotationMetadataConfiguration($paths, $isDevMode, $proxyDir, $cache);

$connection = [
    'dbname' => 'academy',
    'user' => 'root',
    'password' => 'root',
    'host' => 'db',
    'driver' => 'pdo_mysql'
];
// database configuration parameters
// $connection = [
//     'driver' => 'pdo_sqlite',
//     'path' => __DIR__ . '/db.sqlite',
// ];

$entityManager = EntityManager::create($connection, $config);

// $course = new Course;
// $course->setName('test');
// $course->setImage('image.png');
// $course->setDescription('desc');
// $entityManager->persist($course);
// $entityManager->flush();

