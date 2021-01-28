<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\ManyToMany(targetEntity=EffectStudent::class, inversedBy="students")
     */
    private $effectStudents;

    public function __construct()
    {
        $this->effectStudents = new ArrayCollection();
    }

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

    /**
     * @return Collection|EffectStudent[]
     */
    public function getEffectStudents(): Collection
    {
        return $this->effectStudents;
    }

    public function addEffectStudent(EffectStudent $effectStudent): self
    {
        if (!$this->effectStudents->contains($effectStudent)) {
            $this->effectStudents[] = $effectStudent;
        }

        return $this;
    }

    public function removeEffectStudent(EffectStudent $effectStudent): self
    {
        $this->effectStudents->removeElement($effectStudent);

        return $this;
    }
}
