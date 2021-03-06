<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlayerRepository::class)
 */
class Player
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $mood;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $sleep;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $pedagogy;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $charisma;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMood(): ?int
    {
        return $this->mood;
    }

    public function setMood(int $mood): self
    {
        $this->mood = $mood;

        return $this;
    }

    public function getSleep(): ?int
    {
        return $this->sleep;
    }

    public function setSleep(int $sleep): self
    {
        $this->sleep = $sleep;

        return $this;
    }

    public function getPedagogy(): ?int
    {
        return $this->pedagogy;
    }

    public function setPedagogy(int $pedagogy): self
    {
        $this->pedagogy = $pedagogy;

        return $this;
    }

    public function getCharisma(): ?int
    {
        return $this->charisma;
    }

    public function setCharisma(int $charisma): self
    {
        $this->charisma = $charisma;

        return $this;
    }
}
