<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Book;
use AppBundle\Form\BookType;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class BookManager
 * @package AppBundle\Manager
 */
class BookManager extends BaseManager
{

    /**
     * BookManager constructor.
     * @param $em
     * @param $formFactory
     * @param Router $router
     */
    public function __construct($em, $formFactory, Router $router)
    {
        parent::__construct($em, $formFactory, $router);
    }

    /**
     * Method called from controller
     * @return mixed
     */
    public function findAll()
    {
        return $this->em->getRepository('AppBundle:Book')->findAll();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function save(Request $request)
    {
        $book = new Book();
        return $this->handleForm($request, $book);
    }

    /**
     * @param Request $request
     * @param $id
     * @return array|RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        $book = $this->em->getRepository('AppBundle:Book')->find($id);
        return $this->handleForm($request, $book);
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @internal param Request $request
     */
    public function delete($id)
    {
        $book = $this->em->getRepository('AppBundle:Book')->find($id);
        $this->removeAndFlush($book);
        return $this->redirect('book_index');
    }

    /**
     * @param Request $request
     * @param Book $book
     * @return array|RedirectResponse
     */
    public function handleForm(Request $request, $book)
    {
        $form = $this->formFactory->create(BookType::class, $book);
        return $this->handleBaseForm($request, $form, $book, "book_index");
    }

}