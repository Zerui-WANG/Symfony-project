<?php

namespace App\Controller;

use App\Entity\Action;
use App\Repository\StudentRepository;
use App\Service\ActionsService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class BoomController extends AbstractController
{
    /**
     * @Route("/boom", name= "boom")
     * @param UserInterface $user
     * @param EntityManagerInterface $manager
     * @return Response
     */
  ///  # [Route("/boom", name: "boom")]
    public function index(UserInterface $user, EntityManagerInterface $manager): Response
    {
        $students= $this->getDoctrine()
            ->getRepository('App:Student')
            ->findBy(
                ['game' => $this->getUser()->getGame()]
            );

        $dayTime = $this->getUser()->getGame()->getDayTime();
        $app = 'bomm';

        $actionService = new ActionsService($manager, $user);
        $actions = $actionService->actionActivation($app);

        return $this->render("boom/index.html.twig", [
            'students' => $students,
            'dayTime' => $dayTime,
            'actions' => $actions
        ]);
    }

    /**
     * Route("/test/{name?World}",name = "boomName")
     */
 /*   public function name($name):Response
    {
        return new Response("Hello ". $name);
    }

*/
    /**
     * @Route("/boom/1", name= "array")
     * @param StudentRepository $repo
     * @return Response
     */
    public function arrayStudent(StudentRepository $repo) :Response
    {
        return $this->render('boom/index.html.twig',[$repo->findAll()]);
    }


    /**
     * @Route("/boom/2", name= "arrayvide")
     */
    public function arrayS(): Response
    {
        $students= $this->getDoctrine()
            ->getRepository('App:Student')
            ->findBy(
                ['game' => $this->getUser()->getGame()]
            );

        return $this->render("boom/index.html.twig", [
            'students' => $students,
        ]);

    }
}
