<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MediaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
#[ApiResource]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $overview = null;

    #[ORM\Column(length: 255)]
    private ?string $media_type = null;

    #[ORM\Column(length: 255)]
    private ?string $poster_path = null;

    #[ORM\Column]
    private array $genre_ids = [];

    #[ORM\Column]
    private ?float $vote_average = null;

    #[ORM\Column]
    private ?int $vote_count = null;

    #[ORM\ManyToOne(inversedBy: 'liste_medias')]
    private ?Favoris $favoris = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getOverview(): ?string
    {
        return $this->overview;
    }

    public function setOverview(string $overview): static
    {
        $this->overview = $overview;

        return $this;
    }

    public function getMediaType(): ?string
    {
        return $this->media_type;
    }

    public function setMediaType(string $media_type): static
    {
        $this->media_type = $media_type;

        return $this;
    }

    public function getPosterPath(): ?string
    {
        return $this->poster_path;
    }

    public function setPosterPath(string $poster_path): static
    {
        $this->poster_path = $poster_path;

        return $this;
    }

    public function getGenreIds(): array
    {
        return $this->genre_ids;
    }

    public function setGenreIds(array $genre_ids): static
    {
        $this->genre_ids = $genre_ids;

        return $this;
    }

    public function getVoteAverage(): ?float
    {
        return $this->vote_average;
    }

    public function setVoteAverage(float $vote_average): static
    {
        $this->vote_average = $vote_average;

        return $this;
    }

    public function getVoteCount(): ?int
    {
        return $this->vote_count;
    }

    public function setVoteCount(int $vote_count): static
    {
        $this->vote_count = $vote_count;

        return $this;
    }

    public function getFavoris(): ?Favoris
    {
        return $this->favoris;
    }

    public function setFavoris(?Favoris $favoris): static
    {
        $this->favoris = $favoris;

        return $this;
    }
}
