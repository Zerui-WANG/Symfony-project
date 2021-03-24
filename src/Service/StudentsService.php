<?php

namespace App\Service;

use App\Entity\Answer;
use App\Entity\Game;
use App\Entity\Student;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class StudentsService
{
    /**
     * @var UserInterface
     */
    private UserInterface $user;
    /**
     * @var SessionInterface
     */
    private SessionInterface $session;
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $manager, SessionInterface $session, UserInterface $user)
    {
        $this->user = $user;
        $this->session = $session;
        $this->manager = $manager;
    }

    public function create(Game $game): array
    {
        $students = array();

        for($i = 0; $i < 30; $i++) {
            $student = new Student();
            $student->setAttendance(mt_rand(1, 100))
                ->setPersonality(mt_rand(1, 10))
                ->setGrade(mt_rand(5, 15))
                ->setIsFailure(false)
                ->setIsPresent(true)
                ->setGame($game);
            $this->manager->persist($student);
            array_push($students, $student);
        }
        return $students;
    }

    /**
     * @param Answer $answer
     * @param $students
     * @return bool
     * @throws Exception
     */
    public function update(Answer $answer, $students): bool
    {
        $turn = new TurnSystemService($this->manager,$this->session, $this->user);
        $endGame = $turn->turnSystem();

        $player = $this->user->getGame()->getPlayer();

        $effectStudents = $answer->getEffectStudents();

        foreach ($effectStudents as $effectStudent){
            foreach ($students as $student) {
                switch ($effectStudent->getCharacteristicStudent()) {
                    case 'attendance':
                        $student->setAttendance($student->getAttendance() + $player->getCharisma() +
                            $student->getPersonality() + $effectStudent->getValueEffectStudent());

                        if($student->getAttendance()<0)
                            $student->setAttendance(0);
                        if($student->getAttendance()>100)
                            $student->setAttendance(100);

                        $this->manager->flush();
                        break;
                    case 'grade':
                        $student->setGrade($student->getGrade() + $player->getPedagogy() +
                            $student->getPersonality() + $effectStudent->getValueEffectStudent());

                        if($student->getGrade()<0)
                            $student->setGrade(0);
                        if($student->getGrade()>20)
                            $student->setGrade(20);

                        $this->manager->flush();
                        break;
                    case 'isPresent':
                        $student->setIsPresent($effectStudent->getValueEffectStudent());
                        $this->manager->flush();
                        break;
                    case 'isFailure':
                        $student->setIsFailure($effectStudent->getValueEffectStudent());
                        $this->manager->flush();
                        break;
                    default:
                        throw new Exception('Student Characteristic don\'t match');
                }
            }
        }

        return $endGame;
    }
}