<?php

namespace Najdah\PushBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PushController extends Controller
{
    public function indexAction()
    {
        return $this->render('NajdahPushBundle:Push:index.html.twig');
    }
}
