<?php

use Src\Entities\Specialization;
use Src\Helper\EntityManagerCreator;

require __DIR__ . '/index.php';

$entityManager = EntityManagerCreator::createEntityManager();

$repository = $entityManager->getRepository(Specialization::class);
$specializations = $repository->getSpecializationsWithCourses();


/** @var Specialization[] $specializations */
foreach ($specializations as $specialization) {
    echo $specialization->getName() . PHP_EOL;
    foreach ($specialization->courses() as $course) {
        echo ' - ' . $course->getName() . PHP_EOL;
    }
}
