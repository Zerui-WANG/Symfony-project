<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentUpdateController extends AbstractController
{
    /**
     * @Route("/student/update/{idAnswer}", name="student_update")
     */
    public function update(int $idAnswer): Response
    {
        $game = $this->getUser()->getGame();

        $students = $this->getDoctrine()
            ->getRepository(Student::class)
            ->find($game->getStudents());

        $entityManager = $this->getDoctrine()->getManager();

        if(!$students){
            throw $this->createNotFoundException(
                'No students found for game id '.$game->getId()
            );
        }

        $answer = $this->getDoctrine()
            ->getRepository(Answer::class)
            ->find($idAnswer);

        $effectStudents = $answer->getEffectStudents();



        return $this->render('student_update/index.html.twig', [
            'controller_name' => 'StudentUpdateController',
        ]);
    }
}
