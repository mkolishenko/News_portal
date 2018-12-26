<?php

namespace App\Service\Category;

use App\Dto\Category;
use App\Post\PostsCollection;

/**
 * Interface of category page service that provides data post categories page.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
interface CategoryPageServiceInterface
{
    /**
     * Gets category by provided category slug.
     *
     * @param string $slug
     *
     * @return Category
     */
    public function getCategoryBySlug(string $slug): Category;

    /**
     * Gets posts collection for provided category.
     *
     * @param Category $category
     *
     * @return PostsCollection
     */
    public function getPosts(Category $category): PostsCollection;
}
