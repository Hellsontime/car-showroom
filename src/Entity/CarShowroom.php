<?php

namespace App\Entity;

use App\Repository\CarShowroomRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: "cars_showroom")]
#[ORM\Entity(repositoryClass: CarShowroomRepository::class)]
class CarShowroom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 16)]
    private string $color;

    #[ORM\Column(type: 'integer')]
    private string $price;

    #[ORM\Column(type: 'boolean', options: [
        "default" => false
    ])]
    private string $sign;

    #[ORM\Column(type: 'date_immutable', nullable: true)]
    private \DateTimeImmutable $date_of_sale;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function isSign(): ?bool
    {
        return $this->sign;
    }

    public function setSign(bool $sign): self
    {
        $this->sign = $sign;

        return $this;
    }

    public function getDateOfSale(): ?\DateTimeImmutable
    {
        return $this->date_of_sale;
    }

    public function setDateOfSale(?\DateTimeImmutable $date_of_sale): self
    {
        $this->date_of_sale = $date_of_sale;

        return $this;
    }

    #[ORM\ManyToOne(targetEntity: CarModel::class, inversedBy: "cars")]
    private $model;

    /**
     * @return CarModel|null
     */
    public function getModel(): ?CarModel
    {
        return $this->model;
    }

    /**
     * @param CarModel|null $model
     * @return $this
     */
    public function setModel(?CarModel $model): self
    {
        $this->model = $model;

        return $this;
    }
}
