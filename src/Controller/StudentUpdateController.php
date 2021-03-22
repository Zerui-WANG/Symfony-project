<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Student;
use App\Service\StudentsService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentUpdateController extends AbstractController
{
    /**
     * @Route("/student/update/{idAnswer}", name="student_update")
     * @param int $idAnswer
     * @return Response
     * @throws Exception
     */
    public function update(int $idAnswer): Response
    {
        $students = $this->getDoctrine()
            ->getRepository(Student::class)
            ->findBy(
                ['game' => $this->getUser()->getGame()]);

        $entityManager = $this->getDoctrine()->getManager();

        foreach ($students as $student) {
            if (!$student) {
                throw $this->createNotFoundException(
                    'No player found for id ' . $student->getId()
                );
            }
        }

        $answer = $this->getDoctrine()
            ->getRepository(Answer::class)
            ->find($idAnswer);

        $studentsService = new StudentsService();
        $studentsService->update($answer, $students, $entityManager);

        return $this->render('', [
            'students' => $students,
        ]);
    }
}
