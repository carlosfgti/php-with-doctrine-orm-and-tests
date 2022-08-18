<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

require __DIR__ . '/public/index.php';

ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);
