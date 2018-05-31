<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Reportage;

class ReportageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1;$i <= 10; $i++){
            $reportage = new Reportage();
            $reportage->setTitle("titre de l'article $i")
                      ->setContent("contenu de l'article $i")
                      ->setImage("http://placehold.it/350x150")
                      ->setCreatedAt(new \Datetime())
                      ->setCategory("sport");
            $manager->persist($reportage);
        }
        $manager->flush();
    }
}
