<?php

namespace Src\Repositories;

use Doctrine\Persistence\ManagerRegistry;
use Src\Entities\Specialization;
use Doctrine\ORM\EntityRepository;

class CourseRepository extends EntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Specialization::class);
    }
}
