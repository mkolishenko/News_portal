<?php

namespace App\Category;

/**
 * Immutable collection of Category entities.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class CategoriesCollection implements \IteratorAggregate
{
    private $categories;

    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->categories);
    }
}
