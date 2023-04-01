<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator as HeureAssert;

/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 * @ORM\Table(name="etudiant")
 */
class Etudiant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Entrez un nom")
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="etudiants")
     * @ORM\JoinColumn(nullable=false)
     */
    //@Assert\NotBlank(message="Vous devez selectionner un département")
    private $departement;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="etudiants")
     * @ORM\JoinColumn(nullable=false)
     */
    //@Assert\NotBlank(message="Vous devez selectionner une ville")
    private $ville;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     * @HeureAssert\Heure(message="Le format de nb heures doit être hh:mm où hh compris entre 0 et 99 et mm entre 0 et 59")]
     */
    private $nbHeures;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }



    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    public function setDepartement(?Departement $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getVille(): ?Ville
    {
        return $this->ville;
    }

    public function setVille(?Ville $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getNbHeures(): ?string
    {
        return $this->nbHeures;
    }

    public function setNbHeures(?string $nbHeures): self
    {
        $this->nbHeures = $nbHeures;

        return $this;
    }
}
