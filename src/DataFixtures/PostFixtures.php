<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixtures for post entity.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class PostFixtures extends Fixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 15; $i++) {
            $post = new Post();

            $category = $this->getReference(Category::class . '_' . $faker->numberBetween(0, 3));

            $post
                ->setTitle($faker->sentence)
                ->setSlug($faker->slug)
                ->setBody($faker->text($faker->boolean ? 300 : 400))
                ->setCategory($category)
                ->setPublicationDate($faker->dateTime())
                ->setShortDescription($faker->text($faker->boolean ? 100 : 255))
                ->setImage('img/default.png')
            ;

            $manager->persist($post);
        }

        $manager->flush();
    }
}
