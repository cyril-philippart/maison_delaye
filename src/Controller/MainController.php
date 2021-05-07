<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(): Response
    {
        return $this->render('homepage.html.twig', [

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
     * @Route("/les-actualités-de-la-maison-delaye", name="actuality")
     */
    public function actuality(): Response
    {
        return $this->render('actuality.html.twig', [

        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('contact.html.twig', [

        ]);
    }
}
