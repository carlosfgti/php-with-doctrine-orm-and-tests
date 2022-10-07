<?php

namespace Src\Entities;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\{
    Column,
    Entity,
    GeneratedValue,
    Id,
    ManyToMany,
    Table
};
use Src\Repositories\SpecializationRepository;

#[Entity(repositoryClass: SpecializationRepository::class)]
#[Table('specializations')]
class Specialization
{
    #[Id, Column, GeneratedValue]
    private int $id;

    #[Column]
    private string $name;

    #[Column]
    private string $url;

    #[Column]
    private string $image;

    #[Column(name: 'image_social')]
    private string $socialImage;

    #[Column(type: Types::TEXT)]
    private string $description;

    #[Column]
    private string $video;

    #[Column(name: 'created_at')]
    private DateTimeImmutable $createdAt;

    #[ManyToMany(Course::class, mappedBy: "specializations")]
    private Collection $courses;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
    }

    /**
     * @return Collection<Course>
     */
    public function courses(): Collection
    {
        return $this->courses;
    }
}
