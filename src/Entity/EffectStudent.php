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
    private ?int $id;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $valueEffectStudent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $characteristicStudent;

    /**
     * @ORM\ManyToMany(targetEntity=Answer::class, mappedBy="effectStudents")
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
}
