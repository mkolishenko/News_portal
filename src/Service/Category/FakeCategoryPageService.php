<?php

namespace App\Service\Category;

use App\Dto\Category;
use App\Dto\Post;
use App\Exception\EntityNotFoundException;
use App\Post\PostsCollection;
use Faker\Factory;

/**
 * Fake category page service that generates fake data.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class FakeCategoryPageService implements CategoryPageServiceInterface
{
    private const POSTS_LIMIT = 4;
    private const CATEGORIES = [
        'it' => [
            'name' => 'IT',
        ],
        'world' => [
            'name' => 'World',
        ],
        'science' => [
            'name' => 'science',
        ],
        'sport' => [
            'name' => 'Sport',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function getCategoryBySlug(string $slug): Category
    {
        if (!isset(self::CATEGORIES[$slug])) {
            throw new EntityNotFoundException(\sprintf('Category with slug "%s" not found', $slug));
        }

        $faker = Factory::create();

        $dto = new Category(self::CATEGORIES[$slug]['name'], $faker->sentence);

        return $dto;
    }

    /**
     * {@inheritdoc}
     */
    public function getPosts(Category $category): PostsCollection
    {
        $faker = Factory::create();
        $collection = new PostsCollection();

        for ($i = 0; $i < self::POSTS_LIMIT; $i++) {
            $dto = new Post(
                $faker->text,
                $faker->dateTime,
                $category
            );

            $dto->setImage($faker->imageUrl());

            $collection->addPost($dto);
        }

        return $collection;
    }
}
