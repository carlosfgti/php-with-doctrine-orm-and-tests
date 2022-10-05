<?php

namespace Src\Repositories;

use Doctrine\Persistence\ManagerRegistry;
use Src\Entities\Course;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class CourseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Course::class);
    }
}
