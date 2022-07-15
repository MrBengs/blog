<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;


class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 20; $i++) {
            $user[$i] = new User();
            $user[$i]->setName($faker->firstNameMale);
            $user[$i]->setFirstname($faker->lastName);
            $user[$i]->setDateCrea($faker->dateTime($format = 'd-m-Y', $max = 'now', $timezone = null));
            $user[$i]->setRole('user');
            $user[$i]->setLogin($faker->userName());
            $user[$i]->setPassword($faker->password());
            $user[$i]->setEmail($faker->email());

            $manager->persist($user[$i]);
        }
        $manager->flush();
    }
}
