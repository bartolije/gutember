<?php

namespace AppBundle\Manager;

<<<<<<< HEAD
=======

>>>>>>> 7f1f3f7750f155853c89a59f7516d098505490b1
use AppBundle\Entity\Theme;
use AppBundle\Form\ThemeType;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class ThemeManager
 * @package AppBundle\Manager
 */
class ThemeManager extends BaseManager
{

    /**
     * ThemeManager constructor.
     * @param $em
     * @param $formFactory
     * @param Router $router
     */
    public function __construct($em, $formFactory, Router $router)
    {
        parent::__construct($em, $formFactory, $router);
    }

    /**
<<<<<<< HEAD
     * Method called from controller
=======
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->em->getRepository('AppBundle:Theme')->findOneBy(array('id' => $id));
    }

    /**
>>>>>>> 7f1f3f7750f155853c89a59f7516d098505490b1
     * @return mixed
     */
    public function findAll()
    {
        return $this->em->getRepository('AppBundle:Theme')->findAll();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function save(Request $request)
    {
        $theme = new Theme();
        return $this->handleForm($request, $theme);
    }

    /**
     * @param Request $request
     * @param $id
     * @return array|RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        $theme = $this->em->getRepository('AppBundle:Theme')->find($id);
        return $this->handleForm($request, $theme);
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @internal param Request $request
     */
    public function delete($id)
    {
        $theme = $this->em->getRepository('AppBundle:Theme')->find($id);
        $this->removeAndFlush($theme);
        return $this->redirect('theme_index');
    }

    /**
     * @param Request $request
     * @param Theme $theme
     * @return array|RedirectResponse
     */
    public function handleForm(Request $request, $theme)
    {
        $form = $this->formFactory->create(ThemeType::class, $theme);
        return $this->handleBaseForm($request, $form, $theme, "theme_index");
    }

}