<?php

namespace Src\Entities;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\{
    Column,
    Entity,
    GeneratedValue,
    Id,
    JoinTable,
    ManyToMany,
    Table
};
use Src\Repositories\CourseRepository;

#[Entity(repositoryClass: CourseRepository::class)]
#[Table('courses')]
class Course
{
    #[Id]
    #[Column, GeneratedValue]
    private int $id;

    #[Column]
    private string $name;

    #[Column]
    private string $image;

    #[Column(type: Types::TEXT)]
    private string $description;

    #[Column(name: 'created_at')]
    private DateTime $createdAt;

    #[ManyToMany(targetEntity: Specialization::class, inversedBy: "courses")]
    #[JoinTable(name: 'specialization_course')]
    private Collection $specializations;

    public function __construct()
    {
        $this->specializations = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return Collection<Specialization>
     */
    public function specialization(): Collection
    {
        return $this->specialization;
    }
}
