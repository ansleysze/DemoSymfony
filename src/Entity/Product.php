<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
  #[ORM\Id]
   #[ORM\GeneratedValue]
   #[ORM\Column]
   private ?int $id = null;


   #[ORM\Column(length: 255, nullable: true)]
   private ?string $name;


   #[ORM\Column(nullable: true)]
   private ?string $description;


   #[ORM\Column(nullable: true)]
   private ?float $price;


   public function getId(): ?int
   {
       return $this->id;
   }


   public function getName(): ?string
   {
       return $this->name;
   }


   public function setName(string $name): self
   {
       $this->name = $name;

       return $this;
   }


   public function getDescription(): ?string
   {
       return $this->description;
   }


   public function setDescription(string $description): self
   {
       $this->description = $description;

       return $this;
   }


   public function getPrice(): ?float
   {
       return $this->price;
   }


   public function setPrice(float $price): self
   {
       $this->price = $price;

       return $this;
   }
}