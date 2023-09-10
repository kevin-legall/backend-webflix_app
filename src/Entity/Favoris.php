<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\FavorisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FavorisRepository::class)]
#[ApiResource]
class Favoris
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'favoris', targetEntity: Media::class)]
    private Collection $liste_medias;

    public function __construct()
    {
        $this->liste_medias = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getListeMedias(): Collection
    {
        return $this->liste_medias;
    }

    public function addListeMedia(Media $listeMedia): static
    {
        if (!$this->liste_medias->contains($listeMedia)) {
            $this->liste_medias->add($listeMedia);
            $listeMedia->setFavoris($this);
        }

        return $this;
    }

    public function removeListeMedia(Media $listeMedia): static
    {
        if ($this->liste_medias->removeElement($listeMedia)) {
            // set the owning side to null (unless already changed)
            if ($listeMedia->getFavoris() === $this) {
                $listeMedia->setFavoris(null);
            }
        }

        return $this;
    }
}
