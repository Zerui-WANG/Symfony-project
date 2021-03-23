<?php

namespace App\Controller;

use App\Service\TurnSystemService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DesktopController extends AbstractController
{
    /**
     * @Route("/desktop", name="desktop")
     * @param UserInterface $user
     * @return Response
     */
    public function index(UserInterface $user): Response
    {
        $game = $user->getGame();

        return $this->render('desktop/index.html.twig', [
            'game' => $game,
        ]);
    }

    /**
     * @Route("/desktop/event", name="desktop_event")
     * @param EntityManagerInterface $manager
     * @param UserInterface $user
     * @param SessionInterface $session
     * @return Response
     */
    public function eventActivation(EntityManagerInterface $manager, UserInterface $user,
                                    SessionInterface $session): Response
    {
        $event = new TurnSystemService($manager, $session, $user);
        $eventActivated = $event->eventActivation();

        if(is_null($eventActivated))
        {
            return $this->render('event/empty_event.html.twig');
        }

        return $this->forward('App\Controller\UserEventController::show',[
            'event' => $eventActivated
        ]);
    }
}
