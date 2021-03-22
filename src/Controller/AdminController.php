<?php

namespace App\Controller;

use App\Form\EditUserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;
use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/home/admin", name="admin_")
 * @IsGranted("ROLE_ADMIN")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/users", name="users")
     * @param UserRepository $users
     * @return Response
     */
    public function userList(UserRepository $users){
        return $this->render("admin/users.html.twig",['users' => $users->findAll()
        ]);

    }

    /**
     *
     * @Route("/users/edit/{id}", name="edit_user")
     * @param User $user
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function editUser (User $user, Request $request) {
        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);

        if($form ->isSubmitted() && $form ->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            $this->addFlash('message', 'L\'utilisateur a été modifié avec succès');
            return $this->redirectToRoute('admin_users');
        }

        return $this->render('admin/editUser.html.twig',[
            'userForm'=> $form->createView()
        ]);
    }
}
