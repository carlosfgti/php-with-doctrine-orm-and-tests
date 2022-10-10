<?php

use Src\Entities\Course;
use Src\Helper\EntityManagerCreator;

require __DIR__ . '/index.php';

$entityManager = EntityManagerCreator::createEntityManager();

$repository = $entityManager->getRepository(Course::class);
$courses = $repository->getCourses();


/** @var Course[] $courses */
foreach ($courses as $course) {
    echo $course->getName() . PHP_EOL;
}
