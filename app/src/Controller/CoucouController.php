<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Groupe;

final class CoucouController extends AbstractController
{
    #[Route('/coucou', name: 'app_coucou')]
    public function index(): Response
    {
        return $this->render('coucou/index.html.twig', [
            'controller_name' => 'CoucouController', "message" => "Coucou les amis !", "tableau" => ["Prenom"=> "Furina", "Nom"=> "Foçalors", "Age"=> 20], 
            "tableau2" => [
                ["Prenom"=> "Varka", "Nom"=> "Kniht of Boreas", "Age"=> 32],
                ["Prenom"=> "Venti", "Nom"=> "The god of Wisdom", "Age"=> 1200],
                ["Prenom"=> "Hatsune", "Nom"=> "Miku", "Age"=> 16]
            ],
        ]);
    }

    #[Route('/lire-donnee', name: 'app_lire_donnee')]
    public function lireDonnee(EntityManagerInterface $em): Response
    {
        $groupes = $em->getRepository(Groupe::class)->findAll();

        return $this->render(
            'coucou/lire_donnee.html.twig',
            [
                'message' => 'Coucou les amis !',
                'groupes' => $groupes,
            ]
        );
    }

}

