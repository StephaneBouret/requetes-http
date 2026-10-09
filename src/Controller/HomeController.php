<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(): Response
    {
        // Cette instruction est exécutée côté serveur
        $generatedAt = new \DateTimeImmutable();

        // Twig reçoit les données et produit le HTML de la réponse.
        return $this->render('home/index.html.twig', [
            'message' => 'Bienvenue dans mon espace personnel.',
            'generatedAt' => $generatedAt->format('H:i:s'),
        ]);
    }
}
