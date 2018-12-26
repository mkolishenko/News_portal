<?php

namespace App\Controller;

use App\Exception\EntityNotFoundException;
use App\Service\Category\CategoryPageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller for post category pages.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class CategoryController extends AbstractController
{
    /**
     * Renders category page by provided category slug.
     *
     * @param string                       $slug
     * @param CategoryPageServiceInterface $service
     *
     * @return Response
     */
    public function view(string $slug, CategoryPageServiceInterface $service): Response
    {
        try {
            $category = $service->getCategoryBySlug($slug);
        } catch (EntityNotFoundException $e) {
            throw $this->createNotFoundException($e->getMessage());
        }

        $posts = $service->getPosts($category);

        return $this->render('category/view.html.twig', [
            'category' => $category,
            'posts' => $posts,
        ]);
    }
}
