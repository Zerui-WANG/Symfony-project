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
    private ?int $cooldown;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $frequency;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $cooldownMin;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $cooldownMax;

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

    public function getCooldownMin(): ?int
    {
        return $this->cooldownMin;
    }

    public function setCooldownMin(int $cooldownMin): self
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
