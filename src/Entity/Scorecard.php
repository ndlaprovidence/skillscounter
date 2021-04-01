<?php

namespace App\Entity;

use App\Repository\ScorecardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\ManyToMany(targetEntity=Counter::class, inversedBy="scorecards")
     */
    private $Counter;

    public function __construct()
    {
        $this->Counter = new ArrayCollection();
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

    /**
     * @return Collection|Counter[]
     */
    public function getCounter(): Collection
    {
        return $this->Counter;
    }

    public function addCounter(Counter $counter): self
    {
        if (!$this->Counter->contains($counter)) {
            $this->Counter[] = $counter;
        }

        return $this;
    }

    public function removeCounter(Counter $counter): self
    {
        $this->Counter->removeElement($counter);

        return $this;
    }
}
