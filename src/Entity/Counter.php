<?php

namespace App\Entity;

use App\Repository\CounterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tbl_counter")
 * @ORM\Entity(repositoryClass=CounterRepository::class)
 */
class Counter
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
     * @ORM\Column(type="float")
     */
    private $coefficient;

    /**
     * @ORM\ManyToMany(targetEntity=Scorecard::class, mappedBy="Counter")
     */
    private $scorecards;

    public function __construct()
    {
        $this->scorecards = new ArrayCollection();
    }

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

    public function getCoefficient(): ?float
    {
        return $this->coefficient;
    }

    public function setCoefficient(float $coefficient): self
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    /**
     * @return Collection|Scorecard[]
     */
    public function getScorecards(): Collection
    {
        return $this->scorecards;
    }

    public function addScorecard(Scorecard $scorecard): self
    {
        if (!$this->scorecards->contains($scorecard)) {
            $this->scorecards[] = $scorecard;
            $scorecard->addCounter($this);
        }

        return $this;
    }

    public function removeScorecard(Scorecard $scorecard): self
    {
        if ($this->scorecards->removeElement($scorecard)) {
            $scorecard->removeCounter($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->label;
    }
}
