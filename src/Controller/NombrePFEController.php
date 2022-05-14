<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\PFE;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NombrePFEController extends AbstractController
{
    #[Route('/nombrepfe', name: 'app_nombre_p_f_e')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $manager = $doctrine->getManager();
        $repoentre=$manager->getRepository(Entreprise::class);
        $entreprises=$repoentre->findAll();
        $repoEtud=$manager->getRepository(PFE::class);
        $counts=array();
        for ($i=0;$i<count($entreprises);$i++)
        {
            $counts[$i]=count($repoEtud->findBy(["entreprise"=>$entreprises[$i]]));
        }

        return $this->render('NombrePfe.html.twig', [
        "Entreprises"=>$entreprises,"count"=>$counts
        ]);
    }
}
