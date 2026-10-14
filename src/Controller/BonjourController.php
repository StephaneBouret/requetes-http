<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BonjourController extends AbstractController
{
    #[Route('/bonjour', name: 'app_bonjour', methods: ['GET'])]
    public function index(Request $request): Response
    {
        // Lit le paramètre "prenom" dans la chaîne de requête.
        // Utilise "visiteur" si ce paramètre est absent.
        $prenom = $request->query->get('prenom', 'visiteur');
        $ville = $request->query->get('ville', 'non renseignée');

        // Transmet la valeur au template pour préparer le HTML
        return $this->render('bonjour/index.html.twig', [
            'prenom' => $prenom,
            'ville' => $ville,
        ]);
    }
}
