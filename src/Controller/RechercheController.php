<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RechercheController extends AbstractController
{
    #[Route('/rechercher', name: 'app_rechercher', methods: ['GET'])]
    public function rechercher(Request $request): Response
    {
        // Lit le paramètre "q" dans l'URL.
        $recherche = trim($request->query->get('q', ''));

        $catalogue = [
            'Comprendre HTTP',
            'Lire une URL',
            'Envoyer un formulaire',
        ];

        $resultats = [];

        foreach ($catalogue as $titre) {
            // Sans critère, tous les cours sont affichés
            // Sinon, on conserve les titres contenant le texte recherché
            if ($recherche === '' || stripos($titre, $recherche) !== false) {
                $resultats[] = $titre;
            }
        }

        return $this->render('recherche/index.html.twig', [
            'recherche' => $recherche,
            'resultats' => $resultats,
        ]);
    }
}
