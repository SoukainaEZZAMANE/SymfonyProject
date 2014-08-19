<?php

namespace Najdah\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Najdah\AppBundle\Entity;
use Ivory\GoogleMap\Map;
use Ivory\GoogleMap\MapTypeId;
use Ivory\GoogleMap\Overlays\Animation;
use Ivory\GoogleMap\Overlays\Marker;
use Ivory\GoogleMap\Overlays\MarkerImage;

class NoticeController extends Controller
{
    public function noticeAction()
    {
        
        return $this->render('NajdahAppBundle:App:index.html.twig');
    }
    public function getNbrNoticeAction(){
        
        //temporaire ici
        //$allNotices = $em->getRepository('NajdahAppBundle:Declaration')->findAll();
        $nbrNotices = getNomberNoticeAction();
        //le résultat va etre direger vers la racine c-a-d app/Ressources/views (::layout.html.twig)
        return $this->render('::layout.html.twig',array('nbrNotices'=>$nbrNotices));
            //,'allNotices'=>$allNotices));

        #<p>Vous avez ------- {{ render(controller('NajdahAppBundle:Notice:getNbrNotice',{'strategy': 'inline'})) }}
         # nouvelles notifications</p>
        
    }
    public function getNomberNoticeAction(){
        $em = $this->getDoctrine()->getManager();
        $nbrNotices = $em->getRepository('NajdahAppBundle:Declaration')->getNomberNoticeNomber();
        return $nbrNotices;    
    }
    
    public function getLastNoticeAction(){
        $em = $this->getDoctrine()->getManager();
        $lastNotices = $em->getRepository('NajdahAppBundle:Declaration')->getLastNotice();
        return $lastNotices;
    }
    public function getAllNoticeAction(){
        $em = $this->getDoctrine()->getManager();
        $allNotices = $em->getRepository('NajdahAppBundle:Declaration')->findAll();
        $nombreNotice=$this->getNomberNoticeAction();
        $lastNotices=$this->getLastNoticeAction();
        return $this->render('NajdahAppBundle:App:index.html.twig',array('allNotices'=>$allNotices,'nombreNotice'=>$nombreNotice,'lastNotices'=>$lastNotices));
    }

    public function detailsNoticeAction($id){

       // $map=$this->showMap();
        $ok=1;
        /* a utiliser dans le template en tant que {% vender ... %} */
        $lastNotices=$this->getLastNoticeAction();
        $declarationDetails=$this->getDoctrine()->getManager()
                            ->getRepository('NajdahAppBundle:Declaration')->findById($id);
        $nombreNotice=$this->getNomberNoticeAction();
        if (!$declarationDetails) {
            throw $this->createNotFoundException('Aucune déclaration dont id = !!  '.$id);
        }
       // $map=$this->showMap($declarationDetails[0]->getX(),$declarationDetails[0]->getY());
        return $this->render('NajdahAppBundle:App:noticedetails.html.twig',
            array('declarationDetails'=>$declarationDetails,'nombreNotice'=>$nombreNotice,'lastNotices'=>$lastNotices));
           // array('declarationDetails'=>$declarationDetails,'ok'=>$ok,'map'=>$map));
    }


    // this is a test
    public function testMapAction(){

      //  $map=$this->showMap();    
      //  return $this->render('NajdahAppBundle:Test:testMap.html.twig',array('map'=>$map));
    }


  /*   public function showMap($lat,$lng){
        // déployer google map 
        $marker = new Marker();
        $marker->setPosition($lat, $lng, true);
        $marker->setAnimation(Animation::DROP);
        $marker->setOptions(array(
            'clickable' => false,
            'flat'      => true,
        ));

        $map = new Map();
        $map->setAutoZoom(false);
        $map->setCenter($lat, $lng, true);
        $map->setMapOption('zoom', 9);
        $map->setStylesheetOptions(array(
            'width'  => '540px',
            'height' => '300px',
        ));
        $map->addMarker($marker);

        return $map;
    } */

}
