<?php

namespace App\Entity;

use App\Repository\NoteSimulationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tbl_noteSimulation")
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

    public function getId(): ?int
    {
        return $this->id;
    }
}
