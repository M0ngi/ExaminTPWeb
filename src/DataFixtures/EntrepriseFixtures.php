<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EntrepriseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr');

        for($i = 0; $i<20; $i++){
            $entreprise = new Entreprise();
            $entreprise->setNom($faker->name);

            $manager->persist($entreprise);

            $this->addReference('E'.$i, $entreprise);
        }

        $manager->flush();
    }
}
