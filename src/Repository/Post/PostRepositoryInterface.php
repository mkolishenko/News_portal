<?php

namespace App\Repository\Post;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
interface PostRepositoryInterface
{
    /**
     * Finds all posts with related categories.
     *
     * @return mixed
     */
    public function findAllWithCategories();
}
