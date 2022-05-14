<?php
namespace App\DataFixtures;

use App\Entity\Entreprise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
class EntrepriseFixtures extends Fixture
{
public function load(ObjectManager $manager): void
{

for($i = 0 ; $i< 50 ; $i++) {
$entr = new Entreprise();
$entr->setTitle("Title".$i);
$entr->setName("name".$i);
$manager->persist($entr);
}
$manager->flush();

}
}

