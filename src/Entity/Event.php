<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventRepository::class)
 */
class Event extends Question
{

    /**
     * @ORM\Column(type="integer")
     */
    private $cooldown;

    /**
     * @ORM\Column(type="integer")
     */
    private $frequency;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cooldownMin;

    /**
     * @ORM\Column(type="integer")
     */
    private $cooldownMax;

    public function getCooldown(): ?int
    {
        return $this->cooldown;
    }

    public function setCooldown(int $cooldown): self
    {
        $this->cooldown = $cooldown;

        return $this;
    }

    public function getFrequency(): ?int
    {
        return $this->frequency;
    }

    public function setFrequency(int $frequency): self
    {
        $this->frequency = $frequency;

        return $this;
    }

    public function getCooldownMin(): ?string
    {
        return $this->cooldownMin;
    }

    public function setCooldownMin(string $cooldownMin): self
    {
        $this->cooldownMin = $cooldownMin;

        return $this;
    }

    public function getCooldownMax(): ?int
    {
        return $this->cooldownMax;
    }

    public function setCooldownMax(int $cooldownMax): self
    {
        $this->cooldownMax = $cooldownMax;

        return $this;
    }
}
