<?php

namespace App\DataFixtures;

use App\Entity\Ville;
use App\Entity\Departement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // France
        $france = new Departement;
        $france->setName('France');

        $paris = new Ville;
        $paris->setName('Paris');
        $paris->setDepartement($france);

        $marseille = new Ville;
        $marseille->setName('Marseille');
        $marseille->setDepartement($france);

        $lyon = new Ville;
        $lyon->setName('Lyon');
        $lyon->setDepartement($france);

        $manager->persist($france);
        $manager->persist($paris);
        $manager->persist($marseille);
        $manager->persist($lyon);

        // Canada
        $canada = new Departement;
        $canada->setName('Canada');

        $quebec = new Ville;
        $quebec->setName('Québec');
        $quebec->setDepartement($canada);

        $montreal = new Ville;
        $montreal->setName('Montréal');
        $montreal->setDepartement($canada);

        $troisRivieres = new Ville;
        $troisRivieres->setName('Trois-Rivières');
        $troisRivieres->setDepartement($canada);

        $manager->persist($canada);
        $manager->persist($quebec);
        $manager->persist($montreal);
        $manager->persist($troisRivieres);

        // Côte d'ivoire
        $coteDivoire = new Departement;
        $coteDivoire->setName("Côte d'ivoire");

        $abidjan = new Ville;
        $abidjan->setName('Abidjan');
        $abidjan->setDepartement($coteDivoire);

        $yamoussoukro = new Ville;
        $yamoussoukro->setName('Yamoussoukro');
        $yamoussoukro->setDepartement($coteDivoire);

        $bouake = new Ville;
        $bouake->setName('Bouaké');
        $bouake->setDepartement($coteDivoire);

        $manager->persist($coteDivoire);
        $manager->persist($abidjan);
        $manager->persist($yamoussoukro);
        $manager->persist($bouake);

        $manager->flush();
    }
}
