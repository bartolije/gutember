<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Theme;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin/book")
 * @property array categories
 * @property  theme
 */
class BookController extends Controller
{
    /**
     * @Template()
     * @Route("/", name="book_index")
     * @return array
     */
    public function indexAction()
    {
        $books = $this->get('app.book.manager')->findAll();
        return array('books' => $books);
    }

    /**
     * @Template()
     * @Route("/new", name="book_create")
     * @param Request $request
     * @return array
     */
    public function newAction(Request $request)
    {
        return $this->get('app.book.manager')->save($request);
    }

    /**
     * @Template()
     * @Route("/{id}/edit", name="book_edit")
     * @param Request $request
     * @param $id
     * @return array
     */
    public function editAction(Request $request, $id)
    {
        return $this->get('app.book.manager')->edit($request, $id);
    }

    /**
     * @Template()
     * @Route("/{id}/delete", name="book_delete")
     * @param Request $request
     * @param $id
     * @return array
     */
    public function deleteAction(Request $request, $id)
    {
        return $this->get('app.book.manager')->delete($request, $id);
    }
    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param Category $category
     * @return $this
     */
    public function addCategory(Category $category)
    {
        $this->categories[] = $category;
        return $this;
    }

    /**
     * @param Category $category
     */
    public function removeCategory(Category $category)
    {
        $this->categories->removeElement($category);
    }
    #endregion

    /**
     * @return mixed
     */
    public function getThemes()
    {
        return $this->themes;
    }

    /**
     * @param Theme $theme
     * @return $this
     */
    public function addThemes(Theme $theme)
    {
        $this->themes[] = $theme;
        return $this;
    }

    /**
     * @param Theme $theme
     */
    public function removeTheme(Theme $theme)
    {
        $this->theme ->removeElement($theme);
    }
    #endregion

}