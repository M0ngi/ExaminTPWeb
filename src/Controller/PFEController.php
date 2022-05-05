<?php

namespace App\Controller;

use App\Entity\PFE;
use App\Form\PFEType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/pfe')]
class PFEController extends AbstractController
{
    private $manager;
    public function __construct(private ManagerRegistry $doctrine)
    {
        $this->manager = $doctrine->getManager();
    }
    
    #[Route('/add', name: 'add_pfe')]
    public function index(Request $req): Response
    {
        $new_pfe = new PFE();

        $form = $this->createForm(PFEType::class, $new_pfe);
        $form->add('Submit', SubmitType::class);

        $form->handleRequest($req);

        if($form->isSubmitted()){
            $this->manager->persist($new_pfe);
            $this->manager->flush();

            return $this->redirectToRoute('view_pfe', ['id'=>$new_pfe->getId()]);
        }

        return $this->render('pfe/add.html.twig', [
            'add_form' => $form->createView(),
        ]);
    }

    #[Route('/view/{id?0}', name: 'view_pfe')]
    public function view(PFE $pfe=null): Response
    {
        if(!$pfe){
            die('Not found');
        }

        return $this->render('pfe/view.html.twig', [
            'pfe' => $pfe,
        ]);
    }
}
