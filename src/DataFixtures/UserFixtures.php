<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setName('laurent')
             ->setPasswd("laurent")
             ->setEmail('laurent@test.fr');
        $manager->persist($user);
        $manager->flush();
    }
}
