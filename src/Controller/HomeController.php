<?php

namespace App\Controller;

use App\Entity\Canape;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Canape::class);
        $listeCanape = $repository->findAll();

        return $this->render('home/index.html.twig', [
          "listeCanape" => $listeCanape  
        ]);
    }

    #[Route('/canape/{id}', name: 'infoCanape')]
    public function infoCanape(Canape $canape): Response
    {
        return $this->render('home/infoCanape.html.twig', [
            "canape" => $canape
        ]);
    }
}
