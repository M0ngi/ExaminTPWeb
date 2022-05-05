<?php

namespace App\Entity;

use App\Repository\PFERepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PFERepository::class)]
class PFE
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $NomEtudiant;

    #[ORM\Column(type: 'string', length: 255)]
    private $Titre;

    #[ORM\ManyToOne(targetEntity: Entreprise::class, inversedBy: 'PFEs')]
    #[ORM\JoinColumn(nullable: false)]
    private $entreprise;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEtudiant(): ?string
    {
        return $this->NomEtudiant;
    }

    public function setNomEtudiant(string $NomEtudiant): self
    {
        $this->NomEtudiant = $NomEtudiant;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }
}
