<?php

namespace App\Controller;

use App\Entity\Action;
use App\Entity\Answer;
use App\Service\ActionsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NetflipController extends AbstractController
{
    /**
     * @Route("/netflip", name="netflip")
     */
    public function index(): Response
    {
        //dd($this->getDoctrine()->getRepository(Action::class)->find(32)->getApp());
        $action = $this->getDoctrine()->getRepository(Action::class)->findOneBy([
            'app' => 'netflip',
            'game' => $this->getUser()->getGame()
        ]);

        return $this->render('netflip/netflip.html.twig', [
            'action' => $action,
        ]);

    }

    /**
     * @Route("/netflipCatalogue", name="netflipCatalogue")
     */
    public function netflip(): Response
    {
        return $this->render('netflip/netflip.html.twig', [
            'controller_name' => 'NetflipController',
        ]);
    }
}

