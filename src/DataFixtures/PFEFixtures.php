<?php

namespace App\DataFixtures;

use App\Entity\PFE;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PFEFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $PFE=new PFE();
        $faker = Faker\Factory::create();
        for($i=0;$i<10;$i++) {
            $PFE->setName($faker->name);
            $PFE->setTitle($faker->title);
            $manager->persist($PFE);
        }

        $manager->flush();
    }
    
}
