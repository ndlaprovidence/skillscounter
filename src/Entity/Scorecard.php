<?php

namespace App\Entity;

use App\Repository\ScorecardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tbl_scorecard")
 * @ORM\Entity(repositoryClass=ScorecardRepository::class)
 */
class Scorecard
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbCounter;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getNbCounter(): ?int
    {
        return $this->nbCounter;
    }

    public function setNbCounter(int $nbCounter): self
    {
        $this->nbCounter = $nbCounter;

        return $this;
    }
}
