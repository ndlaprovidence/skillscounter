<?php

namespace App\Entity;

use App\Repository\ParentsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParentsRepository::class)
 */
class Students
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
    private $Email_Parents;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmailParents(): ?string
    {
        return $this->Email_Parents;
    }

    public function setEmailParents(string $Email_Parents): self
    {
        $this->Email_Parents = $Email_Parents;

        return $this;
    }
}
