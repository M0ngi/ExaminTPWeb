<?php

namespace App\Controller;

use App\Repository\EntrepriseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/entreprise')]
class EntrePriseController extends AbstractController
{
    #[Route('/view', name: 'view_entreprise')]
    public function index(EntrepriseRepository $repo): Response
    {
        $entreprises = $repo->findAll();
        return $this->render('entre_prise/index.html.twig', [
            'listentreprise' => $entreprises,
        ]);
    }
}
