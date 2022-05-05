<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Entreprise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker as f;
class EntrepriseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $entreprise=new Entreprise();
        $faker = f\Factory::create();
        for($i=0;$i<10;$i++) {
            $entreprise->setName($faker->name);
            $entreprise->setTitle($faker->title);
            $manager->persist($entreprise);
        }

        $manager->flush();
    }
}
