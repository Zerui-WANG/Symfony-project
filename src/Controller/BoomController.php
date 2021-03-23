<?php

namespace App\Controller;

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
        $app = 'boom';

        $actionService = new ActionsService($manager, $user);
        $actions = $actionService->actionActivation($app);

        return $this->render("boom/index.html.twig", [
            'students' => $students,
            'dayTime' => $dayTime,
            'actions' => $actions
        ]);
    }
}
