<?php

namespace App\Entity;

use App\Repository\ActionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActionRepository::class)
 */
class Action extends Question
{
    /**
     * @ORM\Column(type="integer")
     */
    private ?int $duration;

    /**
     * @ORM\Column(type="integer")
     */
    private ?string $actionPeriod;

    /**
     * @ORM\Column(type="boolean")
     */
    private ?bool $isAvailable;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $app;

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getActionPeriod(): ?string
    {
        return $this->actionPeriod;
    }

    public function setActionPeriod(string $actionPeriod): self
    {
        $this->actionPeriod = $actionPeriod;

        return $this;
    }

    public function getIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): self
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    public function getApp(): ?string
    {
        return $this->app;
    }

    public function setApp(string $app): self
    {
        $this->app = $app;

        return $this;
    }
}
