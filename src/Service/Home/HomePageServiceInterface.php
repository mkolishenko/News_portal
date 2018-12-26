<?php

namespace App\Service\Home;

use App\Controller\CategoryController;
use App\Post\PostsCollection;
use App\Category\CategoriesCollection;

/**
 * Interface of home page service that provides data for home page.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
interface HomePageServiceInterface
{
    /**
     * Gets collection of posts for home page.
     *
     * @return PostsCollection
     */
    public function getPosts(): PostsCollection;

    /**
     * Gets collection of categories for home page.
     *
     * @return CategoriesCollection
     */
    public function getCategories(): CategoriesCollection;
}
