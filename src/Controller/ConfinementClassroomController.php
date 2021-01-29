<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class ConfinementClassroomController extends AbstractController
{
    /**
     * @Route("/ConfinementClassroom", name="ConfinementClassroom")
     */
    public function index(): Response
    {
        return $this->render('ConfinementClassroom/index.html.twig', [
            'controller_name' => 'ConfinementClassroomController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home() {
        return $this->render( 'ConfinementClassroom/home.html.twig', [
            'controller_name' => 'ConfinementClassroomControllerHome',
        ]);
    }

    /**
     * @Route("/ConfinementClassroom/register", name="register")
     */
    public function register() {
        return $this->render( 'ConfinementClassroom/register.html.twig', [
            'controller_name' => 'ConfinementClassroomControllerRegister',
        ]);
    }

    /**
     * @Route("/ConfinementClassroom/profil{id}", name="profil")
     */
    public function showProfil($id) {
        $repo = $this->getDoctrine()->getRepository(User::class);

        $user = $repo->find($id);
        return $this->render( 'ConfinementClassroom/profil.html.twig', [
            'user' => $user
        ]);
    }

}
