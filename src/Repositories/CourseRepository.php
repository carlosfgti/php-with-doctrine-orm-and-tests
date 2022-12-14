<?php

namespace Src\Repositories;

use Doctrine\Persistence\ManagerRegistry;
use Src\Entities\Course;
use Doctrine\ORM\EntityRepository;

class CourseRepository extends EntityRepository
{
    // public function __construct(ManagerRegistry $registry)
    // {
    //     parent::__construct($registry, Course::class);
    // }

    /**
     * @return Course[]
     */
    public function getCourses(): array
    {
        return $this->createQueryBuilder('course')
                        ->select('course')
                        ->getQuery()
                        ->getResult();
    }
}
