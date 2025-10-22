<?php

namespace App\Entity;

use App\Repository\DepartementEyatlRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepartementEyatlRepository::class)]
class DepartementEyatl
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $mat = null;

    #[ORM\Column(length: 255)]
    private ?string $home = null;

    #[ORM\ManyToOne(inversedBy: 'departementEyatls')]
    #[ORM\JoinColumn(name: 'faculte_id', referencedColumnName: 'id', nullable: false)]
    private ?FaculteEyatl $faculte = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getMat(): ?string
    {
        return $this->mat;
    }

    public function setMat(string $mat): static
    {
        $this->mat = $mat;
        return $this;
    }

    public function getHome(): ?string
    {
        return $this->home;
    }

    public function setHome(string $home): static
    {
        $this->home = $home;
        return $this;
    }

    public function getFaculte(): ?FaculteEyatl
    {
        return $this->faculte;
    }

    public function setFaculte(?FaculteEyatl $faculte): static
    {
        $this->faculte = $faculte;
        return $this;
    }
}
