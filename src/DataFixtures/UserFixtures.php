<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
       for($i = 0; $i<10; $i++){
           $user = new User();
               $user->setUsername("user$i");
               $user->setLastName($faker->sentence);
               $user->setFirstName($faker->sentence);
               $user->setEmail("user$i@domain.fr");
               $user->setPassword(00000000);
               $user->setCreationDate(new \DateTime());
               $user->setRoles("ROLE_USER");
           $manager->persist($user);
       }
       $manager->flush();
    }



}
