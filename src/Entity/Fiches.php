<?php

namespace App\Entity;

use App\Repository\FichesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FichesRepository::class)
 */
class Fiches
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $BAC_obteined;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Situation;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $old_study;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $Forces;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Weakness;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Activity;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $Inscription;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $future_job;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $telling_about_me;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $self_express;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Speciality;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $first_language;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $second_language;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBACObteined(): ?string
    {
        return $this->BAC_obteined;
    }

    public function setBACObteined(?string $BAC_obteined): self
    {
        $this->BAC_obteined = $BAC_obteined;

        return $this;
    }

    public function getSituation(): ?string
    {
        return $this->Situation;
    }

    public function setSituation(string $Situation): self
    {
        $this->Situation = $Situation;

        return $this;
    }

    public function getOldStudy(): ?string
    {
        return $this->old_study;
    }

    public function setOldStudy(?string $old_study): self
    {
        $this->old_study = $old_study;

        return $this;
    }

    public function getForces(): ?string
    {
        return $this->Forces;
    }

    public function setForces(?string $Forces): self
    {
        $this->Forces = $Forces;

        return $this;
    }

    public function getWeakness(): ?string
    {
        return $this->Weakness;
    }

    public function setWeakness(?string $Weakness): self
    {
        $this->Weakness = $Weakness;

        return $this;
    }

    public function getActivity(): ?string
    {
        return $this->Activity;
    }

    public function setActivity(?string $Activity): self
    {
        $this->Activity = $Activity;

        return $this;
    }

    public function getInscription(): ?string
    {
        return $this->Inscription;
    }

    public function setInscription(string $Inscription): self
    {
        $this->Inscription = $Inscription;

        return $this;
    }

    public function getFutureJob(): ?string
    {
        return $this->future_job;
    }

    public function setFutureJob(?string $future_job): self
    {
        $this->future_job = $future_job;

        return $this;
    }

    public function getTellingAboutMe(): ?string
    {
        return $this->telling_about_me;
    }

    public function setTellingAboutMe(?string $telling_about_me): self
    {
        $this->telling_about_me = $telling_about_me;

        return $this;
    }

    public function getSelfExpress(): ?string
    {
        return $this->self_express;
    }

    public function setSelfExpress(?string $self_express): self
    {
        $this->self_express = $self_express;

        return $this;
    }

    public function getSpeciality(): ?string
    {
        return $this->Speciality;
    }

    public function setSpeciality(?string $Speciality): self
    {
        $this->Speciality = $Speciality;

        return $this;
    }

    public function getFirstLanguage(): ?string
    {
        return $this->first_language;
    }

    public function setFirstLanguage(string $first_language): self
    {
        $this->first_language = $first_language;

        return $this;
    }

    public function getSecondLanguage(): ?string
    {
        return $this->second_language;
    }

    public function setSecondLanguage(string $second_language): self
    {
        $this->second_language = $second_language;

        return $this;
    }
}
