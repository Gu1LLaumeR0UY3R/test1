<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur;

final class GenerateurController extends AbstractController
{
    #[Route('/generer-utilisateurs', name: 'app_generer_utilisateurs')]
    public function genererUtilisateurs(EntityManagerInterface $em): Response
    {
        for($i = 1; $i <= 10; $i++) {
            $utilisateur = new Utilisateur();

            $utilisateur->setEmail("user$i@example.com");
            $utilisateur->setMotDePassse("a");

            $em->persist($utilisateur);
            $em->flush();

        }
        
        return $this->render('generateur/index.html.twig', [
            'controller_name' => 'GenerateurController',
        ]);
    }

    #[Route('/generer-groupes', name: 'app_generer_groupes')]
    public function genererGroupes(EntityManagerInterface $em): Response
    {

        // on attribue un groupe a chaque utilisateur
        // l'id du groupe sera le meme que l'id de l'utilisateur

        foreach($utilisateurs as $utilisateur){
            $util = $utilisateur->getId();
            if($groupe!=null)continue;
            $groupe = new \App\Entity\Groupe();
            $groupe->setNom("Groupe de l'utilisateur $i");

            $em->persist($groupe);
            $em->flush();
            
        }

        
        return $this->render('generateur/index.html.twig', [
            'controller_name' => 'GenerateurController',
        ]);
    }
}
