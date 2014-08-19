<?php

namespace Najdah\EtabBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Najdah\EtabBundle\Entity\Etablissement;
use Najdah\EtabBundle\Form\EtablissementAjouterType;
use Najdah\EtabBundle\Form\EtablissementModifierType;

class EtablissementController extends Controller
{
    public function indexAction()
    {
        $etabs = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('NajdahEtabBundle:Etablissement')
                        ->findAll();
		
        if($etabs === null)
        {
            throw $this->createNotFoundException('Il faut ajouter une Etablissement !!');
        }
        return $this->render('NajdahEtabBundle:Etablissement:index.html.twig',array('etabs' => $etabs));
    }
    
    public function afficherAction($id)
    {
        $etab = $this->getDoctrine()->getManager()->getRepository('NajdahEtabBundle:Etablissement')->find($id);
        if($etab === null)
        {
            throw $this->createNotFoundException('Cette Etablissement n existe pas!!');
        }
        return $this->render('NajdahEtabBundle:Etablissement:afficher.html.twig', array('etab' => $etab));
    }
    
    public function ajouterAction()
    {
        $etab = new Etablissement;
        $form = $this->createForm(new EtablissementAjouterType, $etab);

        // La gestion d'un formulaire est particulière, mais l'idée est la suivante :
        $request = $this->get('request');
        if( $request->getMethod() == 'POST' )
        {
            $form->bind($request);
            if ($form->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($etab);
                $em->flush();

                $this->get('session')->getFlashBag()->add('notice', 'Etablissement bien enregistré');
                return $this->redirect( $this->generateUrl('etab_index') );
            }
        }
        // Si on n'est pas en POST, alors on affiche le formulaire
        return $this->render('NajdahEtabBundle:Etablissement:ajouter.html.twig',array('form' => $form->createView(),));
    }
    
    public function modifierAction($id)
    {
        $etab = $this->getDoctrine()->getManager()->getRepository('NajdahEtabBundle:Etablissement')->find($id);
        if($etab === null)
        {
            throw $this->createNotFoundException('Il faut ajouter une Etablissement !!');
        }

        $form = $this->createForm(new EtablissementModifierType, $etab);

        $request = $this->get('request');
        if( $request->getMethod() == 'POST' )
        {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($etab);
                $em->flush();

                $this->get('session')->getFlashBag()->add('notice', 'Etablissement modifier');
                return $this->redirect($this->generateUrl('etab_index'));
            }
        }
        return $this->render('NajdahEtabBundle:Etablissement:modifier.html.twig',array('form' => $form->createView(),'etab' => $etab));
    }
        
    public function supprimerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $etab = $em->getRepository('NajdahEtabBundle:Etablissement')->find($id);
        if($etab === null)
        {
            throw $this->createNotFoundException('Cette Etablissement n existe pas!!');
        }
        $em->remove($etab);
        $em->flush();
        $this->get('session')->getFlashBag()->add('notice', 'Etablissement supprimer');
        return $this->redirect($this->generateUrl('etab_index'));
    }
    
}
