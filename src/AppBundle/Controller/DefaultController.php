<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller
{
    /**
     * @Route("/index", name="index")
     * @param Request $request
     * @return array
     */
    public function indexAction(Request $request)
    {
        return $this->render('@App/Default/index.html.twig');
    }

    /**
     * @Route("/read", name="read")
     * @param Request $request
     * @return array
     */
    public function readBookAction(Request $request)
    {
        return $this->render('@App/Default/read.html.twig');
    }


//    /**
//     * @Template()
//     * @Route("/read/{token}", name="read")
//     * @param Request $request
//     * @param $token
//     * @return array
//     */
//    public function readAction(Request $request, $token)
//    {
//        $repository = $this ->getDoctrine() ->getManager() ->getRepository('AppBundle:Book');
//        $book = $repository->findOneBy(array('token' => $token));
//
//        if(!($book instanceof Book))
//        {
//            throw new NotFoundHttpException();
//        }
//
//        return array('book' => $book);
//    }


}
