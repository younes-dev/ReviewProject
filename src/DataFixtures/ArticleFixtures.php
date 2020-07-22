<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ArticleFixtures extends Fixture
{

        public function load(ObjectManager $manager)
    {
        $faker= Factory::create('fr_FR');
        for ($i = 1; $i <= 20; $i++) {
            $article= new Article();
            $article->setTitle($faker->words( 3, true))
                ->setSize($faker->numberBetween(10000,90000))
                ->setResume($faker->sentences(3,true))
                ->setContent($faker->sentences(6,true))
                ->setCreatedAt($faker->dateTimeBetween('-3 days', 'now'));

            $manager->persist($article);
        }

        $manager->flush();
    }
}
