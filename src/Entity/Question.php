<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 * @ORM\Table(name="`question`")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *     "question" = "Question",
 *     "event" = "Event",
 *     "action" = "Action",
 * })
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameQuestion;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    private $descriptionQuestion;

    /**
     * @ORM\OneToMany(targetEntity=Answer::class, mappedBy="question")
     */
    private $answers;

    /**
     * @ORM\ManyToMany(targetEntity=Game::class, mappedBy="questions")
     */
    private $games;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
        $this->games = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameQuestion(): ?string
    {
        return $this->nameQuestion;
    }

    public function setNameQuestion(string $nameQuestion): self
    {
        $this->nameQuestion = $nameQuestion;

        return $this;
    }

    public function getDescriptionQuestion(): ?string
    {
        return $this->descriptionQuestion;
    }

    public function setDescriptionQuestion(string $descriptionQuestion): self
    {
        $this->descriptionQuestion = $descriptionQuestion;

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
            $answer->setQuestion($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        if ($this->answers->removeElement($answer)) {
            // set the owning side to null (unless already changed)
            if ($answer->getQuestion() === $this) {
                $answer->setQuestion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Game[]
     */
    public function getGames(): Collection
    {
        return $this->games;
    }

    public function addGame(Game $game): self
    {
        if (!$this->games->contains($game)) {
            $this->games[] = $game;
            $game->addQuestion($this);
        }

        return $this;
    }

    public function removeGame(Game $game): self
    {
        if ($this->games->removeElement($game)) {
            $game->removeQuestion($this);
        }

        return $this;
    }
}
