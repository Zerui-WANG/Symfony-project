<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
 */
class Answer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    private ?string $descriptionAnswer;

    /**
     * @ORM\ManyToMany(targetEntity=EffectStudent::class, inversedBy="answers")
     */
    private $effectStudents;

    /**
     * @ORM\ManyToMany(targetEntity=EffectPlayer::class, inversedBy="answers")
     */
    private $effectPlayers;

    /**
     * @ORM\ManyToMany(targetEntity=Question::class, inversedBy="answers")
     */
    private $questions;

    public function __construct()
    {
        $this->effectStudents = new ArrayCollection();
        $this->effectPlayers = new ArrayCollection();
        $this->questions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptionAnswer(): ?string
    {
        return $this->descriptionAnswer;
    }

    public function setDescriptionAnswer(string $descriptionAnswer): self
    {
        $this->descriptionAnswer = $descriptionAnswer;

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

    /**
     * @return Collection|Question[]
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions[] = $question;
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        $this->questions->removeElement($question);

        return $this;
    }

    public function __toString(): string
    {
        $res = $this->getId();
        return (string) $res;
    }

}
