<?php

namespace Src\Repositories;

use Doctrine\Persistence\ManagerRegistry;
use Src\Entities\Specialization;
use Doctrine\ORM\EntityRepository;

class SpecializationRepository extends EntityRepository
{
    // public function __construct(ManagerRegistry $registry)
    // {
    //     parent::__construct($registry, Specialization::class);
    // }

    /**
     * @return Specialization[]
     */
    public function getSpecializationsWithCourses(): array
    {
        return $this->createQueryBuilder('specialization')
                        ->addSelect('specialization')
                        ->addSelect('course')
                        ->leftJoin('specialization.courses', 'course')
                        ->getQuery()
                        ->getResult();
    }
}
