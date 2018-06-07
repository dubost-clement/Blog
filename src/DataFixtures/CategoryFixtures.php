<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\entity\Category;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $sportCategory = new Category();
        $personalCategory = new Category();

        $sportCategory->setName('sport');
        $personalCategory->setName('personnel');

        $manager->persist($sportCategory);
        $manager->persist($personalCategory);
        
        $manager->flush();
    }
}
