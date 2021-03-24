<?php

namespace App\Entity;

use App\Repository\TeacherRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tbl_teacher")
 * @ORM\Entity(repositoryClass=TeacherRepository::class)
 */
class Teacher extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mainDomain;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMainDomain(): ?string
    {
        return $this->mainDomain;
    }

    public function setMainDomain(?string $mainDomain): self
    {
        $this->mainDomain = $mainDomain;

        return $this;
    }
}
