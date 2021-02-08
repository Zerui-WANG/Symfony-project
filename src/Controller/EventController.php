<?php

namespace App\Controller;

use App\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    /**
     * @Route("/event/{id}", name="event")
     * @param Event $event
     * @return Response
     */
    public function show(Event $event) :Response
    {
        return $this->render('event/show.html.twig', [
            'event' => $event,
            'answers' => $event->getAnswers()
        ]);
    }
}
