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
    $response = $response->withHeader('Access-Control-Allow-Origin', '*');
    $response = $response->withHeader('Access-Control-Allow-Methods', 'GET');
    $response = $response->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin');
    
    $data = ['success' => true];
    $payload = json_encode($data);

    $response->getBody()->write($payload);
    return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
});

$app->get('/specializations', function (Request $request, Response $response) use ($entityManager) {
    $response = $response->withHeader('Access-Control-Allow-Origin', '*');
    $response = $response->withHeader('Access-Control-Allow-Methods', 'GET');
    $response = $response->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin');

    $repository = $entityManager->getRepository(Specialization::class);
    $specializations = $repository->getSpecializationsWithCourses();

    /** @var Specialization[] $specializations */
    $data = [];
    foreach ($specializations as $key => $specialization) {
        $courses = [];
        /** @var Course[] $courses */
        foreach ($specialization->courses() as $course) {
            $courses[] = [
                'id' => $course->getId(),
                'name' => $course->getName(),
                'color' => $course->getColor(),
                'image' => $course->getImage(),
                'description' => $course->getDescription(),
            ];
        }
        $data[$key] = [
            'id' => $specialization->getId(),
            'name' => $specialization->getName(),
            'url' => $specialization->getUrl(),
            'image' => $specialization->getImage(),
            'description' => $specialization->getDescription(),
            'video' => $specialization->getVideo(),
            'date' => $specialization->getDate()->format('d/m/Y'),
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
