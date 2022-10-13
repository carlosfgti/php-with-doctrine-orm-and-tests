<?php

declare(strict_types = 1);

require_once __DIR__ . '/../bootstrap/bootstrap.php';

use Dotenv\Dotenv;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Src\Entities\Course;
use Src\Entities\Specialization;
use Src\Helper\EntityManagerCreator;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$entityManager = EntityManagerCreator::createEntityManager();

$app = AppFactory::create();

/**
 * Routes
 */
$app->get('/', function (Request $request, Response $response) {
    $data = ['success' => true];
    $payload = json_encode($data);

    $response->getBody()->write($payload);
    return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
});

$app->get('/specializations', function (Request $request, Response $response) use ($entityManager) {
    $repository = $entityManager->getRepository(Specialization::class);
    $specializations = $repository->getSpecializationsWithCourses();

    /** @var Specialization[] $specializations */
    $data = [];
    foreach ($specializations as $key => $specialization) {
        $courses = [];
        /** @var Course[] $courses */
        foreach ($specialization->courses() as $course) {
            $courses[] = [
                'name' => $course->getName(),
            ];
        }
        $data[$key] = [
            'name' => $specialization->getName(),
            'courses' => $courses,
        ];
    }
    $payload = json_encode($data);

    $response->getBody()->write($payload);
    return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
});

$app->run();
