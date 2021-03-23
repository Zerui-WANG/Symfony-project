<?php

namespace App\Entity;

use App\Repository\EffectPlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EffectPlayerRepository::class)
 */
class EffectPlayer
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
    private ?int $valueEffectPlayer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $characteristicPlayer;

    /**
     * @ORM\ManyToMany(targetEntity=Answer::class, mappedBy="effectPlayers")
     */
    private $answers;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValueEffectPlayer(): ?int
    {
        return $this->valueEffectPlayer;
    }

    public function setValueEffectPlayer(int $valueEffectPlayer): self
    {
        $this->valueEffectPlayer = $valueEffectPlayer;

        return $this;
    }

    public function getCharacteristicPlayer(): ?string
    {
        return $this->characteristicPlayer;
    }

    public function setCharacteristicPlayer(string $characteristicPlayer): self
    {
        $this->characteristicPlayer = $characteristicPlayer;

        return $this;
    }

    /**
     * @return Collection|Answer[]
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
            $answer->addEffectPlayer($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        if ($this->answers->removeElement($answer)) {
            $answer->removeEffectPlayer($this);
        }

        return $this;
    }
}
