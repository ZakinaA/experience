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
     * @Assert\NotBlank(message="Please enter your name")
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Seems like your issue has been resolved :).")
     * @Assert\Length(min=5)
     */
    private $message;

    /**
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="etudiants")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(message="You need to select your departement")
     */
    private $departement;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="etudiants")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(message="You need to select your ville")
     */
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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

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
