<?php

namespace App\Service;

use App\Entity\Answer;
use App\Entity\Student;
use Exception;

class StudentsService
{
    public function create($manager): array
    {
        $students = array();

        for($i = 0; $i < 25; $i++) {
            $student = new Student();
            $student->setAttendance(mt_rand(1, 100))
                ->setPersonality(mt_rand(1, 10))
                ->setGrade(mt_rand(5, 15))
                ->setIsFailure(false)
                ->setIsPresent(true);
            $manager->persist($student);
            array_push($students, $student);
        }

        return $students;
    }

    /**
     * @param Answer $answer
     * @param $students
     * @param $entityManager
     * @throws Exception
     */
    public function update(Answer $answer, $students, $entityManager)
    {
        $effectStudents = $answer->getEffectStudents();

        foreach ($effectStudents as $effectStudent){
            foreach ($students as $student) {
                switch ($effectStudent->getCharacteristicStudent()) {
                    case 'attendance':
                        $student->setAttendance($student->getAttendance() +
                            $student->getPersonality() + $effectStudent->getValueEffectStudent());
                        $entityManager->flush();
                        break;
                    case 'grade':
                        $student->setGrade($student->getGrade() +
                            $student->getPersonality() + $effectStudent->getValueEffectStudent());

                        if($student->getGrade()>20)
                            $student->setGrade(20);
                        if($student->getGrade()<0)
                            $student->setGrade(0);

                        $entityManager->flush();
                        break;
                    case 'isPresent':
                        $student->setIsPresent($effectStudent->getValueEffectStudent());
                        $entityManager->flush();
                        break;
                    case 'isFailure':
                        $student->setIsFailure($effectStudent->getValueEffectStudent());
                        $entityManager->flush();
                        break;
                    default:
                        throw new Exception('Student Characteristic don\'t match');
                }
            }
        }
    }
}