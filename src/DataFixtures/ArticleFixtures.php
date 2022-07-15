<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 20; $i++) {
            $article[$i] = new Article();
            $article[$i]->setTitle($faker->sentence($nbWords = 6, $variableNbWords = true));
            $article[$i]->setDescription($faker->text($maxNbChars = 200));
            $article[$i]->setAuthor($faker->firstNameMale());
            $article[$i]->setDate($faker->dateTime($format = 'd-m-Y', $max = 'now', $timezone = null));
            $article[$i]->setLikes($faker->numberBetween($min = 0, $max = 200));

            $manager->persist($article[$i]);
        }
        $manager->flush();
    }
}
