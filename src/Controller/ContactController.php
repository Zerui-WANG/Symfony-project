<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/home/contact", name="contact")
     * @param Request $request
     * @param \Swift_Mailer $mailer
     * @return Response
     */
    public function index(Request $request, \Swift_Mailer $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted()&&$form->isValid()){
            $contact = $form->getData();

            //ici on envoit le mail
            $message = (new \Swift_Message('Nouveau contact'))
                //Expéditeur
            ->setFrom($contact['Email'])
                //Destinataire
            ->setTo('confinementClassroom@gmail.com')
                //Message
            ->setBody(
                $this->renderView(
                    'emails/contact.html.twig',compact('contact')
                ),
                    'text/html'
                );

            //envoi du message

            $mailer->send($message);
            $this->addFlash('message','Le message a bien été envoyé');
        }

        return $this->render('contact/index.html.twig', [
            'contactForm' => $form->createView(),
        ]);
    }
}
