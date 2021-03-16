<?php

namespace App\Controller;

use App\Entity\Game;
use App\Service\EventService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DesktopController extends AbstractController
{
    /**
     * @Route("/desktop", name="desktop")
     */
    public function index(): Response
    {
        $game = $this->getDoctrine()->getRepository(Game::class)->find(
            $this->getUser()->getGame()->getId()
        );

        return $this->render('desktop/index.html.twig', [
            'game' => $game,
        ]);
    }

    /**
     * @Route("/desktop/event", name="desktop_event")
     * @param EntityManagerInterface $manager
     * @param UserInterface $user
     * @return Response
     */
    public function eventActivation(EntityManagerInterface $manager, UserInterface $user): Response
    {
        $event = new EventService($manager);
        $eventActivated = $event->eventActivation($user);

        if(is_null($eventActivated))
        {
            return $this->render('event/empty_event.html.twig');
        }

        return $this->forward('App\Controller\UserEventController::show',[
            'event' => $eventActivated
        ]);
    }
}
