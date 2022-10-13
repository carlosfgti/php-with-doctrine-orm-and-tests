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
    JoinTable,
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

    #[Column(name: 'img_social')]
    private string $socialImage;

    #[Column(type: Types::TEXT)]
    private string $description;

    #[Column]
    private string $video;

    #[Column]
    private DateTimeImmutable $date;

    #[Column(name: 'created_at')]
    private DateTimeImmutable $createdAt;

    #[ManyToMany(Course::class, mappedBy: "specializations")]
    #[JoinTable(name: 'specialization_course')]
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

    public function getId(): int|string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getImage(): string
    {
        return $this->image ?? '';
    }

    public function getSocialImage(): string
    {
        return $this->socialImage ?? '';
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    public function getVideo(): string
    {
        return $this->video;
    }
}
