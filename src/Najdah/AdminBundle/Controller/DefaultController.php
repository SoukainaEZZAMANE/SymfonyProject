<?php

namespace Najdah\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('NajdahAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
