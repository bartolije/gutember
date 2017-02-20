<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GutenbookController extends Controller
{
    /**
     * @Route("/index", name="index")
     * @param Request $request
     * @return array
     */
    public function indexAction(Request $request)
    {
        return $this->render('@App/gutenbook/index.html.twig');
    }
    /**
     * @Route("/homepage", name="homepage")
     * @param Request $request
     * @return array
     */
    public function homepageAction(Request $request)
    {
        return $this->render('@App/gutenbook/homepage.html.twig');
    }

    /**
     * @Route("/books-detail", name="books-detail")
     * @param Request $request
     * @return array
     */
    public function bookDetailAction(Request $request)
    {
        return $this->render('@App/gutenbook/books-detail.html.twig');
    }
}
