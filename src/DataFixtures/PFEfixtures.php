<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use App\Entity\PFE;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
class PFEfixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $repo=$manager->getRepository(Entreprise::class);
        for($i=0;$i<200;$i++) {
            $pfe = new PFE();
            $pfe->setName("name".$i);
            $pfe->setTitle("PFE" . $i);
            $entre=$repo->findOneBy(["name"=>"name".rand(0,49)]);
            $pfe->setEntreprise($entre);
            $manager->persist($pfe);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            EntrepriseFixtures::class,
        ];
    }
}

