<?php

namespace App\DataFixtures;

use App\Entity\PFE;
use App\Repository\EntrepriseRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PFEFixture extends Fixture
{
    public function __construct(private EntrepriseRepository $repository)
    {
    }
    
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr');

        for($i=1; $i<11; $i++){
            $pfe = new PFE();
            $pfe->setNomEtudiant($faker->firstName . ' ' . $faker->lastName);
            $pfe->setTitre("Titre " . $i);

            //$this->getReference()

            //$pfe->setEntreprise($i);

            //$manager->persist($pfe);
        }

        $manager->flush();
    }
}
