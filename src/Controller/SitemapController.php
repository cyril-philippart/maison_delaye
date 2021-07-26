<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SitemapController extends AbstractController
{
    /**
     * @Route("/sitemap", name="sitemap", defaults={"_format"="xml"})
     */
    public function index(Request $request): Response
    {
        $hostname = $request->getSchemeAndHttpHost();
        $urls = [];

        $urls[] = [ 'loc' => $this->generateUrl('homepage') ];
        $urls[] = [ 'loc' => $this->generateUrl('theMaisonDelaye') ];
        $urls[] = [ 'loc' => $this->generateUrl('card') ];
        $urls[] = [ 'loc' => $this->generateUrl('actuality') ];
        $urls[] = [ 'loc' => $this->generateUrl('contact') ];

        $response = new Response(
            $this->renderView('sitemap/index.html.twig', [
                'urls' => $urls,
                'hostname' => $hostname
            ]),
            200
        );

        $response->headers->set('Content-type', 'text/xml');

        return $response;
    }
}
