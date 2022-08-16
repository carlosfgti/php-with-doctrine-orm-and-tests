<?php

declare(strict_types = 1);

use Src\Example;

require_once __DIR__ . '/../vendor/autoload.php';

$example = new Example();
var_dump($example->test());
