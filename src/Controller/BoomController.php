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

    public function index(UserInterface $user, EntityManagerInterface $manager): Response
    {
        $students= $this->getDoctrine()
            ->getRepository('App:Student')
            ->findBy(
                ['game' => $this->getUser()->getGame()]
            );

        $dayTime = $this->getUser()->getGame()->getDayTime();
        $actionService = new ActionsService($manager);
        $action = $actionService->actionActivation($user);

        return $this->render("boom/index.html.twig", [
            'students' => $students,
            'dayTime' => $dayTime,
            'action' => $action
        ]);
    }

}
