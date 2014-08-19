<?php

namespace Najdah\AppBundle\Controller;

use \Symfony\Bundle\FrameworkBundle\Controller;
use Najdah\AppBundle\Entity;

  class StatistiqueController extends Controller{

        public function homeAction(){
            $this->render('NajdahAppBundle:Statistiques:index.html.twig',array('lastNotices'=>$lastNotices));
        }
  }