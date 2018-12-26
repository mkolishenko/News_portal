<?php

namespace App\Post;

use App\Category\CategoryMapper;
use App\Dto\Post as PostDto;
use App\Entity\Post;

/**
 * Data mapper for post entity and DTO.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class PostMapper
{
    /**
     * Maps entity to new DTO.
     *
     * @param Post $entity Entity to map.
     *
     * @return PostDto Mapped new post DTO.
     */
    public function entityToDto(Post $entity): PostDto
    {
        $categoryMapper = new CategoryMapper();

        return new PostDto(
            \substr($entity->getBody(), 0, 200),
            new \DateTime(),
            $categoryMapper->entityToDto($entity->getCategory())
        );
    }

    public function dtoToEntity()
    {
        // TODO: implement
    }
}
