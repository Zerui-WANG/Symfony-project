<?php

namespace App\Repository;

use App\Entity\Answer;
use App\Entity\Student;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;

/**
 * @method Student|null find($id, $lockMode = null, $lockVersion = null)
 * @method Student|null findOneBy(array $criteria, array $orderBy = null)
 * @method Student[]    findAll()
 * @method Student[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Student::class);
    }

    public function create($manager): array
    {
        $students = array();

        for($i = 0; $i < 30; $i++) {
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

    /**
     * @param int $value
     * @return Student[] Returns an array of Student objects
     */

    public function findByGame(int $value) : array
    {
        return $this->createQueryBuilder('s')
            ->setParameter('val', $value)
            ->leftJoin('s.game','g')
            ->andWhere('s.game = :val')
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(50)
            ->getQuery()
            ->getResult();
    }


    /*
    public function findOneBySomeField($value): ?Student
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
