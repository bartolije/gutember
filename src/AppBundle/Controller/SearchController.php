<?php
/**
 * Created by PhpStorm.
 * User: jbartoli
 * Date: 26/12/2016
 * Time: 14:44
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class SearchController extends Controller
{

    /**
     * @Template()
     * @Route("view/{book}", name="book_read")
     * @param Book $book
     * @return array
     */
    public function readBook(Book $book)
    {
        if(!($book instanceof Book))
        {
            throw new NotFoundResourceException();
        }

        return array('book' => $book);
    }

    /**
     * @Template()
     * @Route("view/results", name="book_view_results")
     * @param $books
     * @return array
     */
    public function displayBooks($books)
    {
        if(empty($books) || !isset($books))
        {
            throw new NotFoundHttpException();
        }

        return array('books' => $books);
    }

    /**
     * @Route("search/name/{name}", name="book_search_name")
     * @param $name
     * @return array
     */
    public function searchNameAction($name)
    {
        $books = $this->get('app.book.manager')->findBy(array('name' => $name));
        return $this->displayBooks($books);
    }

    /**
     * @Route("search/author/{author}", name="book_search_author")
     * @param $author
     * @return array
     */
    public function searchAuthorAction($author)
    {
        $books = $this->get('app.book.manager')->findBy(array('author' => $author));

        return $this->displayBooks($books);
    }

    /**
     * @Route("search/token/{token}", name="book_search_token")
     * @param $token
     * @return array|RedirectResponse
     * @internal param Request $request
     */
    public function searchTokenAction($token)
    {
        $book = $this->get('app.book.manager')->findOneBy(array('token' => $token));

        if(!($book instanceof Book))
        {
            $this->addFlash('notice', 'No book found, was it a ghost?');
            return new RedirectResponse($this->generateUrl('index'));
        }

        return $this->displayBook($book);
    }
}