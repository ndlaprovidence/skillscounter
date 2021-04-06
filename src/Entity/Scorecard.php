<?php

namespace App\Entity;

use App\Repository\ScorecardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Count(
     *      min = 1,
     *      max = 4,
     *      minMessage = "You must specify at least one counter",
     *      maxMessage = "You cannot specify more than {{ limit }} counters"
     * )
     * @ORM\ManyToMany(targetEntity=Counter::class, inversedBy="scorecards")
     */
    private $Counter;

    /**
     * @ORM\OneToMany(targetEntity=Evaluation::class, mappedBy="scorecard")
     */
    private $evaluations;

    public function __construct()
    {
        $this->Counter = new ArrayCollection();
        $this->evaluations = new ArrayCollection();
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

    /**
     * @return Collection|Evaluation[]
     */
    public function getEvaluations(): Collection
    {
        return $this->evaluations;
    }

    public function addEvaluation(Evaluation $evaluation): self
    {
        if (!$this->evaluations->contains($evaluation)) {
            $this->evaluations[] = $evaluation;
            $evaluation->setScorecard($this);
        }

        return $this;
    }

    public function removeEvaluation(Evaluation $evaluation): self
    {
        if ($this->evaluations->removeElement($evaluation)) {
            // set the owning side to null (unless already changed)
            if ($evaluation->getScorecard() === $this) {
                $evaluation->setScorecard(null);
            }
        }

        return $this;
    }
}
