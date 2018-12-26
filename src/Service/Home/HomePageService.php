<?php

namespace App\Service\Home;

use App\Category\CategoriesCollection;
use App\Post\PostMapper;
use App\Post\PostsCollection;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Post\PostRepositoryInterface;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class HomePageService implements HomePageServiceInterface
{
    private $categoryRepository;
    private $postRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        PostRepositoryInterface $postRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function getPosts(): PostsCollection
    {
        $posts = $this->postRepository->findAllWithCategories();
        $collection = new PostsCollection();
        $dataMapper = new PostMapper();

        foreach ($posts as $post) {
            $collection->addPost($dataMapper->entityToDto($post));
        }

        return $collection;
    }
    /**
     * {@inheritdoc}
     */

    public function getCategories(): CategoriesCollection
    {
        $categories = $this->categoryRepository->findAllIsPublished();

        return new CategoriesCollection($categories);
    }
}
