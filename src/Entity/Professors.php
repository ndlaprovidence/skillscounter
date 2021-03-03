<?php

namespace App\Entity;

use App\Repository\ProfessorsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfessorsRepository::class)
 */
class Professors
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
    private $Mainclass;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMainclass(): ?string
    {
        return $this->Mainclass;
    }

    public function setMainclass(string $Mainclass): self
    {
        $this->Mainclass = $Mainclass;

        return $this;
    }
}
