<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Student;
use App\Service\StudentsService;
use Doctrine\ORM\EntityManagerInterface;
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
     * @param EntityManagerInterface $manager
     * @param UserInterface $user
     * @param SessionInterface $session
     * @param int $template_game_id
     * @return Response
     * @throws Exception
     */
    public function update(int $idAnswer, EntityManagerInterface $manager, UserInterface $user,
                           SessionInterface $session, int $template_game_id): Response
    {
        $students = $this->getDoctrine()->getRepository(Student::class)->findBy([
                'game' => $this->getUser()->getGame()
            ]);

        $answer = $this->getDoctrine()->getRepository(Answer::class)->find($idAnswer);

        $studentsService = new StudentsService($manager, $session, $user, $template_game_id);
        $endGame = $studentsService->update($answer, $students);

        if(!$endGame){
            return $this->render('desktop/index.html.twig', [
                'students' => $students,
                'game' => $this->getUser()->getGame()
            ]);
        }
        return $this->render('end_game/index.html.twig', [
            'game' => $this->getUser()->getGame()
        ]);
    }
}
