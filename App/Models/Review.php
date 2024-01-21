<?php

namespace App\Models;

use App\Core\Model;

class Review extends Model
{
    protected ?int $id;
    protected ?int $offerID;
    protected ?string $author_name;
    protected ?int $stars;
    protected ?string $pluses;
    protected ?string $minuses;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getOfferID(): ?int
    {
        return $this->offerID;
    }

    public function setOfferID(?int $offerID): void
    {
        $this->offerID = $offerID;
    }

    public function getAuthorName(): ?string
    {
        return $this->author_name;
    }

    public function setAuthorName(?string $author_name): void
    {
        $this->author_name = $author_name;
    }

    public function getStars(): ?int
    {
        return $this->stars;
    }

    public function setStars(?int $stars): void
    {
        $this->stars = $stars;
    }

    public function getPluses(): ?string
    {
        return $this->pluses;
    }

    public function setPluses(?string $pluses): void
    {
        $this->pluses = $pluses;
    }

    public function getMinuses(): ?string
    {
        return $this->minuses;
    }

    public function setMinuses(?string $minuses): void
    {
        $this->minuses = $minuses;
    }


}