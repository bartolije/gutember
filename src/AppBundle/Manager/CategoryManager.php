<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Category;
use AppBundle\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class CategoryManager
 * @package AppBundle\Manager
 */
class CategoryManager extends BaseManager
{

    /**
     * CategoryManager constructor.
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
        return $this->em->getRepository('AppBundle:Category')->findAll();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function save(Request $request)
    {
        $category = new Category();
        return $this->handleForm($request, $category);
    }

    /**
     * @param Request $request
     * @param $id
     * @return array|RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        $category = $this->em->getRepository('AppBundle:Category')->find($id);
        return $this->handleForm($request, $category);
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @internal param Request $request
     */
    public function delete($id)
    {
        $category = $this->em->getRepository('AppBundle:Category')->find($id);
        $this->removeAndFlush($category);
        return $this->redirect('category_index');
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return array|RedirectResponse
     */
    public function handleForm(Request $request, $category)
    {
        $form = $this->formFactory->create(CategoryType::class, $category);
        return $this->handleBaseForm($request, $form, $category, "category_index");
    }

}