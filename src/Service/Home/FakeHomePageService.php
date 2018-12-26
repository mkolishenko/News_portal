<?php

namespace App\Service\Home;

use App\Category\CategoriesCollection;
use App\Dto\Category;
use App\Dto\Post;
use App\Post\PostsCollection;

/**
 * Fake home page service that generates test data.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class FakeHomePageService implements HomePageServiceInterface
{
    private const POSTS_COUNT = 4;

    /**
     * {@inheritdoc}
     */
    public function getPosts(): PostsCollection
    {
        $faker = \Faker\Factory::create();
        $collection = new PostsCollection();

        for ($i = 0; $i < self::POSTS_COUNT; $i++) {
            $dto = new Post(
                $faker->text,
                $faker->dateTime,
                new Category('IT', '')
            );

            $dto->setImage($faker->imageUrl());

            $collection->addPost($dto);
        }

        return $collection;
    }

    /**
     * {@inheritdoc}
     */
    public function getCategories(): CategoriesCollection
    {
        return new CategoriesCollection([]);
    }
}
