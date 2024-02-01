<?php

namespace App\Entity;

use App\Repository\PhoneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhoneRepository::class)]
class Phone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'phones')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Manufacturer $manufacturer_id = null;

    #[ORM\Column]
    private ?int $battery_capacity = null;

    #[ORM\Column]
    private ?int $ram_capacity = null;

    #[ORM\Column]
    private ?int $megapixels_number = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column(length: 512)]
    private ?string $description = null;

    #[ORM\Column(length: 312)]
    private ?string $image_link = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getManufacturerId(): ?Manufacturer
    {
        return $this->manufacturer_id;
    }

    public function setManufacturerId(?Manufacturer $manufacturer_id): static
    {
        $this->manufacturer_id = $manufacturer_id;

        return $this;
    }

    public function getBatteryCapacity(): ?int
    {
        return $this->battery_capacity;
    }

    public function setBatteryCapacity(int $battery_capacity): static
    {
        $this->battery_capacity = $battery_capacity;

        return $this;
    }

    public function getRamCapacity(): ?int
    {
        return $this->ram_capacity;
    }

    public function setRamCapacity(int $ram_capacity): static
    {
        $this->ram_capacity = $ram_capacity;

        return $this;
    }

    public function getMegapixelsNumber(): ?int
    {
        return $this->megapixels_number;
    }

    public function setMegapixelsNumber(int $megapixels_number): static
    {
        $this->megapixels_number = $megapixels_number;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImageLink(): ?string
    {
        return $this->image_link;
    }

    public function setImageLink(string $image_link): static
    {
        $this->image_link = $image_link;

        return $this;
    }
}
