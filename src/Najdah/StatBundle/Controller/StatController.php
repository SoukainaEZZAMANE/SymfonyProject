<?php

namespace Najdah\StatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StatController extends Controller
{
    public function indexAction()
    {
        $request = $this->get('request');
        $rep = $this->getDoctrine()
                                ->getManager()
                                ->getRepository('NajdahAppBundle:Declaration');
        
        
        /*
        $resultat = $this->getDoctrine()
                                ->getManager()
                                ->getRepository('NajdahAppBundle:Declaration')
                                ->declarationsMois();
         * 
         */
        $donnees1=null;
        $donnees2=null;
        $donnees3=null;
        $donnees4=null;
        $data1=null;
        $data2=null;
        
        
        if( $request->getMethod() == 'POST' )
        {
            // donnees1 donnees2 donnees3 donnees4
            $donnees1=$rep->declarationsPar($request->request->get('select1'));
            $donnees2=$rep->declarationsParType('Accident',$request->request->get('select1'));
            $donnees3=$rep->declarationsParType('Incendie',$request->request->get('select1'));
            $donnees4=$rep->declarationsParType('Vol',$request->request->get('select1'));
            
            // donnees0
            $donnees0=$rep->declarationsMois();
            
            // data1 data2
            
        }
        else{
            // donnees1 donnees2 donnees3 donnees4
            $donnees1=$rep->declarationsPar('jours');
            $donnees2=$rep->declarationsParType('Accident','jours');
            $donnees3=$rep->declarationsParType('Incendie','jours');
            $donnees4=$rep->declarationsParType('Vol','jours');
            
            // donnees0
            $donnees0=$rep->declarationsMois();
            
            // data1 data2
            
        }
        
        return $this->render('NajdahStatBundle:Stat:index.html.twig',
                array(
                    'donnees0' => $donnees0,
                    'donnees1' => $donnees1,
                    'donnees2' => $donnees2,
                    'donnees3' => $donnees3,
                    'donnees4' => $donnees4,
                    'data1' => $data1,
                    'data2' => $data2
                ));
    }
}
