<?php

namespace App\Entity;

use App\Repository\EffectStudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EffectStudentRepository::class)
 */
class EffectStudent
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
    private $valueEffectStudent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $characteristicStudent;

    /**
     * @ORM\ManyToMany(targetEntity=Answer::class, mappedBy="effectStudents")
     */
    private $answers;

    /**
     * @ORM\ManyToMany(targetEntity=Student::class, mappedBy="effectStudents")
     */
    private $students;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
        $this->students = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValueEffectStudent(): ?int
    {
        return $this->valueEffectStudent;
    }

    public function setValueEffectStudent(int $valueEffectStudent): self
    {
        $this->valueEffectStudent = $valueEffectStudent;

        return $this;
    }

    public function getCharacteristicStudent(): ?string
    {
        return $this->characteristicStudent;
    }

    public function setCharacteristicStudent(string $characteristicStudent): self
    {
        $this->characteristicStudent = $characteristicStudent;

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
            $answer->addEffectStudent($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        if ($this->answers->removeElement($answer)) {
            $answer->removeEffectStudent($this);
        }

        return $this;
    }

    /**
     * @return Collection|Student[]
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->addEffectStudent($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->removeElement($student)) {
            $student->removeEffectStudent($this);
        }

        return $this;
    }
}
