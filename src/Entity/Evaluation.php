<?php

namespace App\Entity;

use App\Repository\EvaluationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tbl_evaluation")
 * @ORM\Entity(repositoryClass=EvaluationRepository::class)
 */
class Evaluation
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
     * @ORM\Column(type="date")
     */
    private $dateEvaluation;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $valueNote1;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $valueNote2;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $valueNote3;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $valueNote4;

    /**
     * @ORM\ManyToOne(targetEntity=Scorecard::class, inversedBy="evaluations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $scorecard;

    /**
     * @ORM\ManyToOne(targetEntity=Student::class, inversedBy="evaluations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $student;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

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

    public function getDateEvaluation(): ?\DateTimeInterface
    {
        return $this->dateEvaluation;
    }

    public function setDateEvaluation(\DateTimeInterface $dateEvaluation): self
    {
        $this->dateEvaluation = $dateEvaluation;

        return $this;
    }

    public function getValueNote1(): ?float
    {
        return $this->valueNote1;
    }

    public function setValueNote1(float $valueNote1): self
    {
        $this->valueNote1 = $valueNote1;

        return $this;
    }

    public function getValueNote2(): ?float
    {
        return $this->valueNote2;
    }

    public function setValueNote2(?float $valueNote2): self
    {
        $this->valueNote2 = $valueNote2;

        return $this;
    }

    public function getValueNote3(): ?float
    {
        return $this->valueNote3;
    }

    public function setValueNote3(?float $valueNote3): self
    {
        $this->valueNote3 = $valueNote3;

        return $this;
    }

    public function getValueNote4(): ?float
    {
        return $this->valueNote4;
    }

    public function setValueNote4(?float $valueNote4): self
    {
        $this->valueNote4 = $valueNote4;

        return $this;
    }

    public function getScorecard(): ?Scorecard
    {
        return $this->scorecard;
    }

    public function setScorecard(?Scorecard $scorecard): self
    {
        $this->scorecard = $scorecard;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
