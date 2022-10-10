<?php

declare(strict_types = 1);

require_once __DIR__ . '/../bootstrap/bootstrap.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
