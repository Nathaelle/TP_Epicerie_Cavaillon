<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Categorie;
use Faker\Factory as Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker::create('fr_FR');

        for($i = 0; $i < 6; $i++) {

            $categorie = new Categorie();
            $categorie->setNom($faker->sentence(3))
                    ->setDescription($faker->text(100));

                    for($j = 0; $j < 8; $j++) {

                        $article = new Article();
                        $article->setNom($faker->sentence(3))
                                ->setDescription($faker->text(100))
                                ->setPrix($faker->randomFloat(2, 2, 1250))
                                ->setQuantite($faker->numberBetween(0, 1000))
                                ->setCategorie($categorie);

                        $manager->persist($article);

                    }

            $manager->persist($categorie);

        }

        $manager->flush();
    }
}
