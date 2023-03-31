<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $etudiant = new Etudiant;

        $form = $this->createForm(EtudiantFormType::class, $etudiant);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($etudiant);
            $em->flush();

            $this->addFlash('success', 'Thanks for your message. We\'ll get back to you shortly.');
            return $this->redirectToRoute('app_home');
        }

        return $this->renderForm('home.html.twig', compact('form'));
    }
}
