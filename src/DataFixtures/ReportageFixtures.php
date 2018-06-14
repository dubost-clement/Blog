<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Reportage;
use App\entity\Category;

class ReportageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for($i = 1; $i <= 2; $i++){
            $category = new Category();
            $category->setName($faker->sentence(1));
            $manager->persist($category);

            for($j = 1;$j <= 10; $j++){
                $reportage = new Reportage();
                $reportage->setTitle($faker->sentence())
                          ->setContent($faker->paragraph())
                          ->setImage("http://placehold.it/350x150")
                          ->setCreatedAt($faker->dateTimeBetween('-2 months'))
                          ->setCategory($category);
                $manager->persist($reportage);
            }
        }
        $manager->flush();
    }
}
