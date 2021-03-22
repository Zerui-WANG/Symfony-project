<?php

namespace App\Controller;

use App\Entity\EffectPlayer;
use App\Form\EffectPlayerType;
use App\Repository\EffectPlayerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/effect/player")
 */
class EffectPlayerController extends AbstractController
{
    /**
     * @Route("/", name="effect_player_index", methods={"GET"})
     * @param EffectPlayerRepository $effectPlayerRepository
     * @return Response
     */
    public function index(EffectPlayerRepository $effectPlayerRepository): Response
    {
        return $this->render('effect_player/index.html.twig', [
            'effect_players' => $effectPlayerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="effect_player_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $effectPlayer = new EffectPlayer();
        $form = $this->createForm(EffectPlayerType::class, $effectPlayer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($effectPlayer);
            $entityManager->flush();

            return $this->redirectToRoute('effect_player_index');
        }

        return $this->render('effect_player/new.html.twig', [
            'effect_player' => $effectPlayer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="effect_player_show", methods={"GET"})
     * @param EffectPlayer $effectPlayer
     * @return Response
     */
    public function show(EffectPlayer $effectPlayer): Response
    {
        return $this->render('effect_player/show.html.twig', [
            'effect_player' => $effectPlayer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="effect_player_edit", methods={"GET","POST"})
     * @param Request $request
     * @param EffectPlayer $effectPlayer
     * @return Response
     */
    public function edit(Request $request, EffectPlayer $effectPlayer): Response
    {
        $form = $this->createForm(EffectPlayerType::class, $effectPlayer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('effect_player_index');
        }

        return $this->render('effect_player/edit.html.twig', [
            'effect_player' => $effectPlayer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="effect_player_delete", methods={"DELETE"})
     * @param Request $request
     * @param EffectPlayer $effectPlayer
     * @return Response
     */
    public function delete(Request $request, EffectPlayer $effectPlayer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$effectPlayer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($effectPlayer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('effect_player_index');
    }
}
