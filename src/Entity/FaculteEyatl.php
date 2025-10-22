<?php

namespace App\Entity;

use App\Repository\FaculteEyatlRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FaculteEyatlRepository::class)]
class FaculteEyatl
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $cnss = null;

    /**
     * @var Collection<int, DepartementEyatl>
     */
    #[ORM\OneToMany(targetEntity: DepartementEyatl::class, mappedBy: 'faculte')]
    private Collection $yes;

    public function __construct()
    {
        $this->yes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCnss(): ?int
    {
        return $this->cnss;
    }

    public function setCnss(int $cnss): static
    {
        $this->cnss = $cnss;

        return $this;
    }

    /**
     * @return Collection<int, DepartementEyatl>
     */
    public function getYes(): Collection
    {
        return $this->yes;
    }

    public function addYe(DepartementEyatl $ye): static
    {
        if (!$this->yes->contains($ye)) {
            $this->yes->add($ye);
            $ye->setFaculte($this);
        }

        return $this;
    }

    public function removeYe(DepartementEyatl $ye): static
    {
        if ($this->yes->removeElement($ye)) {
            // set the owning side to null (unless already changed)
            if ($ye->getFaculte() === $this) {
                $ye->setFaculte(null);
            }
        }

        return $this;
    }
}
