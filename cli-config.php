<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use Src\Helper\EntityManagerCreator;

require __DIR__ . '/public/index.php';

$entityManager = EntityManagerCreator::createEntityManager();

ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);
