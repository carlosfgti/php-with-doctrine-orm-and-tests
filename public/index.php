<?php

declare(strict_types = 1);

require_once __DIR__ . '/../bootstrap/bootstrap.php';

use Dotenv\Dotenv;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Src\Entities\Course;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$paths = [__DIR__."/../src/Entities"];
$isDevMode = (bool) $_ENV['IS_DEV'];
$config = ORMSetup::createAnnotationMetadataConfiguration($paths, $isDevMode);

$connection = [
    'dbname' => $_ENV['DB_NAME'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
    'host' => $_ENV['DB_HOST'],
    'driver' => $_ENV['DB_DRIVE'] ?? 'pdo_mysql'
];
// database configuration parameters
// $connection = [
//     'driver' => 'pdo_sqlite',
//     'path' => __DIR__ . '/db.sqlite',
// ];

$entityManager = EntityManager::create($connection, $config);
$conn = $entityManager->getConnection();
$conn->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

// $course = new Course;
// $course->setName('test');
// $course->setImage('image.png');
// $course->setDescription('desc');
// $entityManager->persist($course);
// $entityManager->flush();

