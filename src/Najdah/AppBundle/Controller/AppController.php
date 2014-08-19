<?php

namespace Najdah\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{
    public function acceuilAction()
    {
        $em = $this->getDoctrine()->getManager();
        $statistiques = $em->getRepository('NajdahAppBundle:Declaration')->declarationParVille();

        $nbrall =$this->nombreAllDeclarationAction();
        $nbrAllCitoyen=$this->nombreAllCitoyenAction();

        return $this->render('NajdahStatBundle:Stat:statistique2.html.twig',array('statistiqueVille'=>$statistiques,'nbrAllDec'=>$nbrall,'nbrAllCitoyen'=>$nbrAllCitoyen));
    }

    public function nombreAllDeclarationAction(){

        $em = $this->getDoctrine()->getManager();
        $nbrall = $em->getRepository('NajdahAppBundle:Declaration')->getNombreAllDeclaration();
        return $nbrall;
    }

    public function nombreAllCitoyenAction(){

        $em = $this->getDoctrine()->getManager();
        $nbrall = $em->getRepository('NajdahUserBundle:Citoyen')->getNombreAllCitoyen();
        return $nbrall;
    }
}
