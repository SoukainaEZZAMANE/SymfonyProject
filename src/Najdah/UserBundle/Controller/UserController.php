<?php

namespace Najdah\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Najdah\UserBundle\Entity\User;
use Najdah\UserBundle\Form\UserAjouterType;
use Najdah\UserBundle\Form\UserModifierType;

class UserController extends Controller
{
    public function indexAction($type_user)
    {   
        $var='';
        if($type_user=='Policier')  $var='l';
        else    $var='m';
        $users = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('NajdahUserBundle:User')
                        ->findBy( array('type' => $var),array('nom' => 'asc') );
		
        if($users === null)
        {
            throw $this->createNotFoundException('Il faut ajouter un '.$type_user.' !!');
        }
        return $this->render('NajdahUserBundle:User:index.html.twig',array('users' => $users,'type_user' => $type_user));
    }
    
    public function afficherAction($type_user,$id)
    {
        $user = $this->getDoctrine()->getManager()->getRepository('NajdahUserBundle:User')->find($id);
        if($user === null)
        {
            throw $this->createNotFoundException('Ce '.$type_user.' n existe pas!!');
        }
        return $this->render('NajdahUserBundle:User:afficher.html.twig', array('user' => $user));
    }
    
    public function ajouterAction($type_user)
    {
        $user = new User;
        $form = $this->createForm(new UserAjouterType, $user);

        // La gestion d'un formulaire est particulière, mais l'idée est la suivante :
        $request = $this->get('request');
        if( $request->getMethod() == 'POST' )
        {
            $form->bind($request);
            if ($form->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                //ici
                //$user->setUsername($user->getMatricule());
                $user->setEmail($user->getUsername()."@Najdah.com");
                $user->setEnabled(1);
                $user->setPlainPassword('irisi');
                if($type_user=='Policier')      $user->setType('l');
                else    $user->setType('m');
                $em->persist($user);
                $em->flush();

                $this->get('session')->getFlashBag()->add('notice', 'User bien enregistré');
                return $this->redirect( $this->generateUrl('user_index', array('type_user' => $type_user)) );
            }
        }
        // Si on n'est pas en POST, alors on affiche le formulaire
        return $this->render('NajdahUserBundle:User:ajouter.html.twig',array('type_user' => $type_user,'form' => $form->createView(),));
    }
    
    public function modifierAction($type_user,$id)
    {
        $user = $this->getDoctrine()->getManager()->getRepository('NajdahUserBundle:User')->find($id);
        if($user === null)
        {
            throw $this->createNotFoundException('Il faut ajouter un '.$type_user.' !!');
        }

        $form = $this->createForm(new UserModifierType, $user);

        $request = $this->get('request');
        if( $request->getMethod() == 'POST' )
        {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                $this->get('session')->getFlashBag()->add('notice', 'User modifier');
                return $this->redirect($this->generateUrl('user_index', array('type_user' => $type_user)));
            }
        }
        return $this->render('NajdahUserBundle:User:modifier.html.twig',array('form' => $form->createView(),'user' => $user));
    }
        
    public function supprimerAction($type_user,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('NajdahUserBundle:User')->find($id);
        if($user === null)
        {
            throw $this->createNotFoundException('Ce '.$type_user.' n existe pas!!');
        }
        $em->remove($user);
        $em->flush();
        $this->get('session')->getFlashBag()->add('notice', 'User supprimer');
        return $this->redirect($this->generateUrl('user_index', array('type_user' => $type_user)));
    }
    
    public function lastUserAction()
    {
        /*
        $user = $this->getUser();
        $request = $this->getRequest();
        $request->cookies->set('username',$user->getUsername() );
         */

        return $this->render('NajdahUserBundle:User:lastUser.html.twig');
    }
    
    public function rolesAction($type_user,$id)
    {   
        $user = $this->getDoctrine()->getManager()->getRepository('NajdahUserBundle:User')->find($id);
        if($user === null)
        {
            throw $this->createNotFoundException('Il faut ajouter un '.$type_user.' !!');
        }

        
        $request = $this->get('request');
        if( $request->getMethod() == 'POST' )
        {
            $em = $this->getDoctrine()->getManager();
            //ICI
            if ($this->get('security.context')->isGranted('ROLE_ADMIN_POLICIER')) {
                if ($request->request->get('ROLE_POLICIER')!="")     $user->addRole('ROLE_POLICIER');
                else        $user->removeRole('ROLE_POLICIER');
            }
            if ($this->get('security.context')->isGranted('ROLE_ADMIN_POMPIER')) {
                if ($request->request->get('ROLE_POMPIER')!="")     $user->addRole('ROLE_POMPIER');
                else        $user->removeRole('ROLE_POMPIER');
            }
            if ($this->get('security.context')->isGranted('ROLE_ADMIN')) {
                if ($request->request->get('ROLE_ADMIN_POLICIER')!="")     $user->addRole('ROLE_ADMIN_POLICIER');
                else        $user->removeRole('ROLE_ADMIN_POLICIER');
            }
            if ($this->get('security.context')->isGranted('ROLE_ADMIN')) {
                if ($request->request->get('ROLE_ADMIN_POMPIER')!="")     $user->addRole('ROLE_ADMIN_POMPIER');
                else        $user->removeRole('ROLE_ADMIN_POMPIER');
            }
            if ($this->get('security.context')->isGranted('ROLE_SUPER_ADMIN')) {
                if ($request->request->get('ROLE_ADMIN')!="")     $user->addRole('ROLE_ADMIN');
                else        $user->removeRole('ROLE_ADMIN');
            }
            if ($this->get('security.context')->isGranted('ROLE_SUPER_ADMIN')) {
                if ($request->request->get('ROLE_SUPER_ADMIN')!="")     $user->addRole('ROLE_SUPER_ADMIN');
                else        $user->removeRole('ROLE_SUPER_ADMIN');
            }

            
            
            $em->persist($user);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'User modifier');
            return $this->redirect($this->generateUrl('user_index', array('type_user' => $type_user)));
        
        }
        return $this->render('NajdahUserBundle:User:roles.html.twig',array('type_user' => $type_user,'user' => $user));
    }
}
