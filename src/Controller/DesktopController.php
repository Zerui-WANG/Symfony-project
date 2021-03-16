<?php

namespace App\Controller;

use App\Entity\Game;
use App\Service\eventService;
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
     */
    public function eventActivation(EntityManagerInterface $manager, UserInterface $user)
    {
        $event = new eventService($manager);

        if(is_null($event->eventActivation($user))){
            return $this->render('desktop/index.html.twig', [
                'event' => $event->eventActivation($user),
            ]);
        }

        return $this->render('desktop/index.html.twig', [
            'event' => $event->eventActivation($user),
        ]);
    }
}
