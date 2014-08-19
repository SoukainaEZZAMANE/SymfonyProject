<?php

namespace Najdah\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Najdah\AppBundle\Entity\Declaration;
use Najdah\AppBundle\Form\DeclarationType;

class DeclarationController extends Controller
{
    public function indexAction()
    {
        $declarations = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('NajdahAppBundle:Declaration')
                        ->findAll();
		
        if($declarations === null)
        {
            throw $this->createNotFoundException('Il faut ajouter une Declaration !!');
        }
        return $this->render('NajdahAppBundle:Declaration:index.html.twig',array('declarations' => $declarations));
    }
    
    public function afficherAction($id)
    {
        $declaration = $this->getDoctrine()->getManager()->getRepository('NajdahAppBundle:Declaration')->find($id);
        if($declaration === null)
        {
            throw $this->createNotFoundException('Cette Declaration n existe pas!!');
        }
        return $this->render('NajdahAppBundle:Declaration:afficher.html.twig', array('declaration' => $declaration));
    }
    
    public function ajouterAction()
    {
        $declaration = new Declaration;
        $form = $this->createForm(new DeclarationType, $declaration);

        $request = $this->get('request');
        if( $request->getMethod() == 'POST' )
        {
            $form->bind($request);
            if ($form->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($declaration);
                $em->flush();

                $this->get('session')->getFlashBag()->add('notice', 'Declaration bien enregistrÃ©');
                return $this->redirect( $this->generateUrl('declaration_index') );
            }
        }
        // Si on n'est pas en POST, alors on affiche le formulaire
        return $this->render('NajdahAppBundle:Declaration:ajouter.html.twig',array('form' => $form->createView(),));
    }
    
    public function modifierAction($id)
    {
        $declaration = $this->getDoctrine()->getManager()->getRepository('NajdahAppBundle:Declaration')->find($id);
        if($declaration === null)
        {
            throw $this->createNotFoundException('Il faut ajouter une Declaration !!');
        }

        $form = $this->createForm(new DeclarationType, $declaration);

        $request = $this->get('request');
        if( $request->getMethod() == 'POST' )
        {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($declaration);
                $em->flush();

                $this->get('session')->getFlashBag()->add('notice', 'Declaration modifier');
                return $this->redirect($this->generateUrl('declaration_index'));
            }
        }
        return $this->render('NajdahAppBundle:Declaration:modifier.html.twig',array('form' => $form->createView(),'declaration' => $declaration));
    }
        
    public function supprimerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $declaration = $em->getRepository('NajdahAppBundle:Declaration')->find($id);
        if($declaration === null)
        {
            throw $this->createNotFoundException('Cette Declaration n existe pas!!');
        }
        $em->remove($declaration);
        $em->flush();
        $this->get('session')->getFlashBag()->add('notice', 'Declaration supprimer');
        return $this->redirect($this->generateUrl('declaration_index'));
    }
    
}
