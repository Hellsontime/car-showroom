<?php

namespace App\Entity;

use App\Repository\CarModelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: "vehicles_directory")]
#[ORM\Entity(repositoryClass: CarModelRepository::class)]
class CarModel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 32)]
    private string $model;

    #[ORM\Column(type: 'smallint')]
    private int $year;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    #[ORM\OneToMany(mappedBy: "model", targetEntity: CarShowroom::class)]
    private $cars;

    public function __construct()
    {
        $this->cars = new ArrayCollection();
    }

    /**
     * @return Collection|CarShowroom[]
     */
    public function getCars(): ArrayCollection
    {
        return $this->cars;
    }
}
