<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $mood;

    /**
     * @ORM\Column(type="integer")
     */
    private $sleep;

    /**
     * @ORM\Column(type="integer")
     */
    private $pedagogy;

    /**
     * @ORM\Column(type="integer")
     */
    private $charisma;

    /**
     * @ORM\ManyToMany(targetEntity=EffectPlayer::class, inversedBy="players")
     */
    private $effectPlayers;

    public function __construct()
    {
        $this->effectPlayers = new ArrayCollection();
    }

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

    /**
     * @return Collection|EffectPlayer[]
     */
    public function getEffectPlayers(): Collection
    {
        return $this->effectPlayers;
    }

    public function addEffectPlayer(EffectPlayer $effectPlayer): self
    {
        if (!$this->effectPlayers->contains($effectPlayer)) {
            $this->effectPlayers[] = $effectPlayer;
        }

        return $this;
    }

    public function removeEffectPlayer(EffectPlayer $effectPlayer): self
    {
        $this->effectPlayers->removeElement($effectPlayer);

        return $this;
    }
}
