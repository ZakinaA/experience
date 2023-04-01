<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Helper\TimeHelper;


class EtudiantController extends AbstractController
{
    #[Route('/', name: 'app_etudiant_add')]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        $etudiant = new Etudiant;

        $form = $this->createForm(EtudiantFormType::class, $etudiant);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $nbHeuresSaisies = $etudiant->getNbHeures();
            $nbHeuresSaisies2 = $form->get('nbHeures2')->getData();
                   
            $result = TimeHelper::addTime($nbHeuresSaisies, $nbHeuresSaisies2);
            
            $em->persist($etudiant);
            //$em->flush();

            $this->addFlash('success', 'Super, ça marche :  '. $nbHeuresSaisies . ' + ' . $nbHeuresSaisies2 . ' = ' .$result);
            return $this->redirectToRoute('app_etudiant_add');
        }

        return $this->renderForm('etudiant_add.html.twig', compact('form'), );
    }

    

}
