<?php

namespace Najdah\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Najdah\UserBundle\Entity\Citoyen;
use Najdah\UserBundle\Form\CitoyenType;

class CitoyenController extends Controller
{
    public function indexAction()
    {
        $citoyens = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('NajdahUserBundle:Citoyen')
                        ->findAll();
		
        if($citoyens === null)
        {
            throw $this->createNotFoundException('Il faut ajouter un citoyen !!');
        }
        return $this->render('NajdahUserBundle:Citoyen:index.html.twig',array('citoyens' => $citoyens));
    }
    
    public function afficherAction($id)
    {
        $citoyen = $this->getDoctrine()->getManager()->getRepository('NajdahUserBundle:Citoyen')->find($id);
        if($citoyen === null)
        {
            throw $this->createNotFoundException('Ce citoyen n existe pas!!');
        }
        return $this->render('NajdahUserBundle:Citoyen:afficher.html.twig', array('citoyen' => $citoyen));
    }
    
    public function ajouterAction()
    {
        $citoyen = new Citoyen;
        $form = $this->createForm(new CitoyenType, $citoyen);

        // La gestion d'un formulaire est particulière, mais l'idée est la suivante :
        $request = $this->get('request');
        if( $request->getMethod() == 'POST' )
        {
                $form->bind($request);
                if ($form->isValid()) {
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($citoyen);
                        $em->flush();

                        $this->get('session')->getFlashBag()->add('notice', 'Citoyen bien enregistré');
                        return $this->redirect( $this->generateUrl('citoyen_index') );
                }
        }
        // Si on n'est pas en POST, alors on affiche le formulaire
        return $this->render('NajdahUserBundle:Citoyen:ajouter.html.twig',array('form' => $form->createView(),));
    }
    
    public function modifierAction($id)
	{
		$citoyen = $this->getDoctrine()->getManager()->getRepository('NajdahUserBundle:Citoyen')->find($id);
		if($citoyen === null)
		{
                    throw $this->createNotFoundException('Il faut ajouter un citoyen !!');
		}
		
		$form = $this->createForm(new CitoyenType, $citoyen);

		$request = $this->get('request');
		if( $request->getMethod() == 'POST' )
		{
			$form->bind($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($citoyen);
				$em->flush();

				$this->get('session')->getFlashBag()->add('notice', 'Citoyen modifier');
				return $this->redirect($this->generateUrl('citoyen_index'));
			}
		}
		return $this->render('NajdahUserBundle:Citoyen:modifier.html.twig',array('form' => $form->createView(),'citoyen' => $citoyen));
	}
	public function supprimerAction($id)
	{
        $em = $this->getDoctrine()->getManager();
        $citoyen = $em->getRepository('NajdahUserBundle:Citoyen')->find($id);
		if($citoyen === null)
		{
		    throw $this->createNotFoundException('Ce citoyen n existe pas!!');
		}
        $em->remove($citoyen);
        $em->flush();
        $this->get('session')->getFlashBag()->add('notice', 'Citoyen supprimer');
		return $this->redirect($this->generateUrl('citoyen_index'));
	}
}
