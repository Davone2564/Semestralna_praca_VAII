<?php

namespace App\Models;

use App\Core\Model;

class Offer extends Model
{
    protected ?int $id = null;
    protected ?string $name;
    protected ?string $picture;
    protected ?string $location;
    protected ?string $contact;
    protected ?int $price;

    protected ?int $authorID;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): void
    {
        $this->picture = $picture;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }
    public function setContact(?string $contact): void
    {
      $this->contact = $contact;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }

    public function getAuthorID(): ?string
    {
        return $this->authorID;
    }

    public function setAuthorID(?string $authorID): void
    {
        $this->authorID = $authorID;
    }
}