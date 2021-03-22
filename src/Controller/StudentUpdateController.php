<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Student;
use App\Service\StudentsService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class StudentUpdateController extends AbstractController
{
    /**
     * @Route("/student/update/{idAnswer}", name="student_update")
     * @param int $idAnswer
     * @param UserInterface $user
     * @param SessionInterface $session
     * @return Response
     * @throws Exception
     */
    public function update(int $idAnswer, UserInterface $user, SessionInterface $session): Response
    {
        $students = $this->getDoctrine()->getRepository(Student::class)->findBy([
                'game' => $this->getUser()->getGame()
            ]);

        $entityManager = $this->getDoctrine()->getManager();

        $answer = $this->getDoctrine()->getRepository(Answer::class)->find($idAnswer);

        $studentsService = new StudentsService();
        $studentsService->update($answer, $students, $entityManager, $user, $session);

        return $this->render('desktop/index.html.twig', [
            'students' => $students,
        ]);
    }
}
