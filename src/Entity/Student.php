<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
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
    private $attendance;

    /**
     * @ORM\Column(type="integer")
     */
    private $personality;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $grade;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isFailure;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPresent;

    /**
     * @ORM\ManyToOne(targetEntity=Game::class, inversedBy="students")
     * @ORM\JoinColumn(nullable=false)
     */
    private $game;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAttendance(): ?int
    {
        return $this->attendance;
    }

    public function setAttendance(int $attendance): self
    {
        $this->attendance = $attendance;

        return $this;
    }

    public function getPersonality(): ?int
    {
        return $this->personality;
    }

    public function setPersonality(int $personality): self
    {
        $this->personality = $personality;

        return $this;
    }

    public function getGrade(): ?int
    {
        return $this->grade;
    }

    public function setGrade(?int $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getIsFailure(): ?bool
    {
        return $this->isFailure;
    }

    public function setIsFailure(bool $isFailure): self
    {
        $this->isFailure = $isFailure;

        return $this;
    }

    public function getIsPresent(): ?bool
    {
        return $this->isPresent;
    }

    public function setIsPresent(bool $isPresent): self
    {
        $this->isPresent = $isPresent;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): self
    {
        $this->game = $game;

        return $this;
    }
}
