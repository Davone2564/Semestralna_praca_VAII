<?php

namespace App\Models;

use App\Core\Model;

class Country extends Model
{
    protected ?int $id = null;
    protected ?string $name;
    protected ?string $continent;
    protected ?string $flag;
    protected ?int $population;
    protected ?string $capital_city;
    protected ?int $area;

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

    public function getContinent(): ?string
    {
        return $this->continent;
    }

    public function setContinent(?string $continent): void
    {
        $this->continent = $continent;
    }

    public function getFlag(): ?string
    {
        return $this->flag;
    }

    public function setFlag(?string $flag): void
    {
        $this->flag = $flag;
    }

    public function getPopulation(): ?int
    {
        return $this->population;
    }

    public function setPopulation(?int $population): void
    {
        $this->population = $population;
    }

    public function getCapitalCity(): ?string
    {
        return $this->capital_city;
    }

    public function setCapitalCity(?string $capital_city): void
    {
        $this->capital_city = $capital_city;
    }

    public function getArea(): ?int
    {
        return $this->area;
    }

    public function setArea(?int $area): void
    {
        $this->area = $area;
    }


}