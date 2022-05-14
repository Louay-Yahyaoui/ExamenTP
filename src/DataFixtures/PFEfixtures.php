<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use App\Entity\PFE;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
class PFEfixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $repo=$manager->getRepository(Entreprise::class);
        for($i=0;$i<200;$i++) {
            $pfe = new PFE();
            $pfe->setName("name".$i);
            $pfe->setTitle("PFE" . $i);
            $pfe->setEntreprise($repo->findOneBy(["name"=>"Name".$i+rand(0,49)]));
            $manager->persist($pfe);
        }

        $manager->flush();
    }

}

