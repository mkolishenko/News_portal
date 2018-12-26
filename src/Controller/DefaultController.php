<?php

namespace App\Controller;

use App\Form\ContactsType;
use App\Service\Contacts\ContactsPageServiceInterface;
use App\Service\Home\HomePageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Default site controller.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class DefaultController extends AbstractController
{
    /**
     * Renders home page.
     *
     * @param HomePageServiceInterface $service
     *
     * @return Response
     */
    public function index(HomePageServiceInterface $service): Response
    {
        $posts = $service->getPosts();
        $categories = $service->getCategories();

        return $this->render('default/index.html.twig', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    /**
     * Renders contacts page with feedback form.
     *
     * @param Request                      $request
     * @param ContactsPageServiceInterface $service
     *
     * @return Response
     *
     * @Route("/contacts", name="contacts")
     */
    public function contacts(Request $request, ContactsPageServiceInterface $service): Response
    {
        $form = $this->createForm(ContactsType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', 'Your feedback was successfully saved!');
        }

        return $this->render('default/contacts.html.twig', [
            'page' => $service->getContacts(),
            'form' => $form->createView(),
        ]);
    }
}
