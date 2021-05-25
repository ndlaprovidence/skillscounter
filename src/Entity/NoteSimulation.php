<?php

namespace App\Entity;

use App\Repository\NoteSimulationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteSimulationRepository::class)
 */
class NoteSimulation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $A1T1;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $A1T2;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $A1T3;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $A2T1;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $A2T2;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $A2T3;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $ScienEP1;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $ScienEP2;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $ScienEP3;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $HistEP1;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $HistEP2;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $HistEP3;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $LVAEP1;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $LVAEP2;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $LVAEP3;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $LVBEP1;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $LVBEP2;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $LVBEP3;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $EPSEP1;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $EPSEP2;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $EPSEP3;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $SPEEP1;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $SPEEP2;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $SPEEP3;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $FranE;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $FranO;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Philo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $GrandOral;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Spe1;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Spe2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NameTest;

    public function __construct()
    {
        $this->setNameTest('Simulation de note');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getA1T1(): ?float
    {
        return $this->A1T1;
    }

    public function setA1T1(?float $A1T1): self
    {
        $this->A1T1 = $A1T1;

        return $this;
    }

    public function getA1T2(): ?float
    {
        return $this->A1T2;
    }

    public function setA1T2(?float $A1T2): self
    {
        $this->A1T2 = $A1T2;

        return $this;
    }

    public function getA1T3(): ?float
    {
        return $this->A1T3;
    }

    public function setA1T3(?float $A1T3): self
    {
        $this->A1T3 = $A1T3;

        return $this;
    }

    public function getA2T1(): ?float
    {
        return $this->A2T1;
    }

    public function setA2T1(?float $A2T1): self
    {
        $this->A2T1 = $A2T1;

        return $this;
    }

    public function getA2T2(): ?float
    {
        return $this->A2T2;
    }

    public function setA2T2(?float $A2T2): self
    {
        $this->A2T2 = $A2T2;

        return $this;
    }

    public function getA2T3(): ?float
    {
        return $this->A2T3;
    }

    public function setA2T3(?float $A2T3): self
    {
        $this->A2T3 = $A2T3;

        return $this;
    }

    public function getScienEP1(): ?float
    {
        return $this->ScienEP1;
    }

    public function setScienEP1(?float $ScienEP1): self
    {
        $this->ScienEP1 = $ScienEP1;

        return $this;
    }

    public function getScienEP2(): ?float
    {
        return $this->ScienEP2;
    }

    public function setScienEP2(?float $ScienEP2): self
    {
        $this->ScienEP2 = $ScienEP2;

        return $this;
    }

    public function getScienEP3(): ?float
    {
        return $this->ScienEP3;
    }

    public function setScienEP3(?float $ScienEP3): self
    {
        $this->ScienEP3 = $ScienEP3;

        return $this;
    }

    public function getHistEP1(): ?float
    {
        return $this->HistEP1;
    }

    public function setHistEP1(?float $HistEP1): self
    {
        $this->HistEP1 = $HistEP1;

        return $this;
    }

    public function getHistEP2(): ?float
    {
        return $this->HistEP2;
    }

    public function setHistEP2(?float $HistEP2): self
    {
        $this->HistEP2 = $HistEP2;

        return $this;
    }

    public function getHistEP3(): ?float
    {
        return $this->HistEP3;
    }

    public function setHistEP3(?float $HistEP3): self
    {
        $this->HistEP3 = $HistEP3;

        return $this;
    }

    public function getLVAEP1(): ?float
    {
        return $this->LVAEP1;
    }

    public function setLVAEP1(?float $LVAEP1): self
    {
        $this->LVAEP1 = $LVAEP1;

        return $this;
    }

    public function getLVAEP2(): ?float
    {
        return $this->LVAEP2;
    }

    public function setLVAEP2(?float $LVAEP2): self
    {
        $this->LVAEP2 = $LVAEP2;

        return $this;
    }

    public function getLVAEP3(): ?float
    {
        return $this->LVAEP3;
    }

    public function setLVAEP3(?float $LVAEP3): self
    {
        $this->LVAEP3 = $LVAEP3;

        return $this;
    }

    public function getLVBEP1(): ?float
    {
        return $this->LVBEP1;
    }

    public function setLVBEP1(?float $LVBEP1): self
    {
        $this->LVBEP1 = $LVBEP1;

        return $this;
    }

    public function getLVBEP2(): ?float
    {
        return $this->LVBEP2;
    }

    public function setLVBEP2(?float $LVBEP2): self
    {
        $this->LVBEP2 = $LVBEP2;

        return $this;
    }

    public function getLVBEP3(): ?float
    {
        return $this->LVBEP3;
    }

    public function setLVBEP3(?float $LVBEP3): self
    {
        $this->LVBEP3 = $LVBEP3;

        return $this;
    }

    public function getEPSEP1(): ?float
    {
        return $this->EPSEP1;
    }

    public function setEPSEP1(?float $EPSEP1): self
    {
        $this->EPSEP1 = $EPSEP1;

        return $this;
    }

    public function getEPSEP2(): ?float
    {
        return $this->EPSEP2;
    }

    public function setEPSEP2(?float $EPSEP2): self
    {
        $this->EPSEP2 = $EPSEP2;

        return $this;
    }

    public function getEPSEP3(): ?float
    {
        return $this->EPSEP3;
    }

    public function setEPSEP3(?float $EPSEP3): self
    {
        $this->EPSEP3 = $EPSEP3;

        return $this;
    }

    public function getSPEEP1(): ?float
    {
        return $this->SPEEP1;
    }

    public function setSPEEP1(float $SPEEP1): self
    {
        $this->SPEEP1 = $SPEEP1;

        return $this;
    }

    public function getSPEEP2(): ?float
    {
        return $this->SPEEP2;
    }

    public function setSPEEP2(?float $SPEEP2): self
    {
        $this->SPEEP2 = $SPEEP2;

        return $this;
    }

    public function getSPEEP3(): ?float
    {
        return $this->SPEEP3;
    }

    public function setSPEEP3(?float $SPEEP3): self
    {
        $this->SPEEP3 = $SPEEP3;

        return $this;
    }

    public function getFranE(): ?float
    {
        return $this->FranE;
    }

    public function setFranE(?float $FranE): self
    {
        $this->FranE = $FranE;

        return $this;
    }

    public function getFranO(): ?float
    {
        return $this->FranO;
    }

    public function setFranO(?float $FranO): self
    {
        $this->FranO = $FranO;

        return $this;
    }

    public function getPhilo(): ?float
    {
        return $this->Philo;
    }

    public function setPhilo(?float $Philo): self
    {
        $this->Philo = $Philo;

        return $this;
    }

    public function getGrandOral(): ?float
    {
        return $this->GrandOral;
    }

    public function setGrandOral(?float $GrandOral): self
    {
        $this->GrandOral = $GrandOral;

        return $this;
    }

    public function getSpe1(): ?float
    {
        return $this->Spe1;
    }

    public function setSpe1(?float $Spe1): self
    {
        $this->Spe1 = $Spe1;

        return $this;
    }

    public function getSpe2(): ?float
    {
        return $this->Spe2;
    }

    public function setSpe2(?float $Spe2): self
    {
        $this->Spe2 = $Spe2;

        return $this;
    }

    public function getNameTest(): ?string
    {
        // $nameTest = $this->getNameTest();
        // if (!isset($nameTest)) {
        //     $this->setNameTest('Sans nom');
        // }
        return $this->NameTest;
    }

    public function setNameTest(?string $NameTest): self
    {
        $this->NameTest = $NameTest;

        return $this;
    }
}
