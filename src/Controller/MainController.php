<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    

    /**
     * @Route("/", name="homepage")
     */
    public function homepage(ProductsRepository $productsRepository): Response
    {
        $allProducts = $productsRepository->findAll();
        return $this->render('homepage.html.twig', [
            'allproducts' => $allProducts
        ]);
    }

    /**
     * @Route("/la-maison-delaye", name="theMaisonDelaye")
     */
    public function theMaisonDelaye(): Response
    {
        return $this->render('theMaisonDelaye.html.twig', [

        ]);
    }

    /**
     * @Route("/la-carte", name="card")
     */
    public function card(): Response
    {
        return $this->render('card.html.twig', [

        ]);
    }

    /**
     * @Route("/les-actualites-de-la-maison-delaye", name="actuality")
     */
    public function actuality(): Response
    {
        return $this->render('actuality.html.twig', [

        ]);
    }

    /**
     * @Route("/mentions-legales", name="legalMention")
     */
    public function legalMention(): Response
    {
        return $this->render('legalMention.html.twig', [

        ]);
    }

    /**
     * @Route("/contact", name="contact", methods={"GET","POST"})
     */
    public function contactCreate(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        $messageValidation = '';
        
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $messageFromClient = $form->getData();
            $message = (new \Swift_Message('Nouveau message depuis le site'))
                ->setFrom($messageFromClient['mail'])
                ->setTo('contact@maisondelaye.com')
                ->setBody(
                    $this->renderView(
                        'layout/mail.html.twig', ['messageFromClient' => $messageFromClient ]
                    ), 'text/html'
                )
            ;
            $mailer->send($message);

            $informationClient = $form->getData();
    
            $firstname = $informationClient['firstname'];
            $lastname = $informationClient['lastname'];
            $company = $informationClient['company'];
            $mail = $informationClient['mail'];
            $object = $informationClient['object'];
            $message = $informationClient['message'];

            if ($firstname !== '' || $lastname !== '' || $company !== '' || $mail !== '' || $object !== '' || $message !== '') {
                $messageValidation = 'Votre message à bien été envoyé';
            }
        }

        
            return $this->render('contact.html.twig', [
                'form' => $form->createView(),
                'messageValidation' => $messageValidation
            ]);
        
    }
}
