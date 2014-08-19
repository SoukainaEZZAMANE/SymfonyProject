<?php

namespace Najdah\InterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Najdah\UserBundle\Entity\Citoyen;
use Najdah\AppBundle\Entity\Declaration;
use Najdah\AppBundle\Entity\Attachement;

//use .\..\..\..\..\web\najdah\tcpdf\TCPDF;

class InterController extends Controller {

    public function creerUserAction() {
        $request = $this->getRequest();

        $citoyen = new Citoyen;

        $citoyen->setNom($request->request->get('nom'));
        $citoyen->setPrenom($request->request->get('prenom'));
        $citoyen->setCin($request->request->get('cin'));
        $citoyen->setTel($request->request->get('tel'));

        /*
          $citoyen->setNom($request->query->get('nom'));
          $citoyen->setPrenom($request->query->get('prenom'));
          $citoyen->setCin($request->query->get('cin'));
          $citoyen->setTel($request->query->get('tel'));

          $citoyen->setNom('DANI');
          $citoyen->setPrenom('Bourasse');
          $citoyen->setCin('Ab 781402');
          $citoyen->setTel('0667282367');
         */
        $em = $this->getDoctrine()->getManager();
        $em->persist($citoyen);
        $em->flush();

        $this->get('session')->getFlashBag()->add('notice', 'Citoyen bien enregistré');

        $lastID = $citoyen->getId();

        $response = new Response(json_encode(array(array('id' => $lastID))));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function setDeclarationAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $declaration = new Declaration;

        //$_POST['citoyen']."','1','".$_POST['type']."','".$_POST['dated']."','".$_POST['x'].$_POST['y'].$_POST['blesses']$_POST['lanceur']$_POST['description']
        //$declaration->setDate($request->request->get('dated'));
        $declaration->setDate(new \Datetime());
        $declaration->setX($request->request->get('x'));
        $declaration->setY($request->request->get('y'));
        $declaration->setAdresse('Adresse');
        $declaration->setNbrBlesses($request->request->get('blesses'));
        $declaration->setNatureLanceur($request->request->get('lanceur'));
        $declaration->setDescription($request->request->get('description'));

        /*
          $declaration->setX('32.855');
          $declaration->setY('7.0124');
          $declaration->setAdresse('Adresse');
          $declaration->setNbrBlesses(7);
          $declaration->setNatureLanceur('v'); */

        $cit = $em->getRepository('NajdahUserBundle:Citoyen')->find($request->request->get('citoyen'));
        $declaration->setCitoyen($cit);
        //$int = $em->getRepository('NajdahUserBundle:Citoyen')->find($request->request->get('citoyen'));
        //$declaration->setIntervenants($int);

        $eta = $em->getRepository('NajdahAppBundle:EtatDeclaration')->find(1);
        $declaration->setEtat($eta);
        $typ = $em->getRepository('NajdahAppBundle:TypeDeclaration')->find(1);
        $declaration->setType($typ);
        
        $em->persist($declaration);
        $em->flush();
        
        
        
        for($i=0;$i<$request->request->get('nbr');$i++){
            $attachement=new Attachement;
            
            $base=$_POST['photo'.$i];
            $binary=base64_decode($base);
            header('Content-Type: bitmap; charset=utf-8');
            $file = fopen(__DIR__.'/../../../../web/najdah/img/attachement/'.$declaration->getId().'_'.$i.'.jpg', 'wb');
            fwrite($file, $binary);
            fclose($file);
            $attachement->setLien($declaration->getId().'_'.$i);
            $attachement->setTitre('Titre : '.$declaration->getId().'_'.$i);
            $attachement->setDescription($request->request->get('description'.$i));

            $declaration->addAttachement($attachement);
            $em->persist($declaration);
            $em->persist($attachement);
            $em->flush();
        }
        $this->get('session')->getFlashBag()->add('notice', 'Citoyen bien enregistré');

        $lastID = $declaration->getId();

        $response = new Response(json_encode(array(array('id' => $lastID))));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    
    // Fonctions rapport :
    function init_header($pdf) {
        $request = $this->getRequest();
        
        $txt1 = <<<EOD
ROYAUME DU MAROC
EOD;

        $pdf->SetFillColor(255, 255, 255);
        $pdf->setCellPaddings(0, 0, 0, 0);
        $pdf->SetFont('aealarabiya', 'B', 18);
        $pdf->MultiCell(70, 5, $txt1, 0, 'L', 1, 0, 130, 10, true);

        $txt1 = <<<EOD
SURETE NATIONAL
EOD;
        $pdf->SetFont('aealarabiya', ' ', 13);
        $pdf->MultiCell(70, 5, $txt1, 0, 'L', 1, 0, 125, 20, true);

        $txt1 = <<<EOD
المملكة   المغربية
EOD;

        $pdf->SetFillColor(255, 255, 255);
        $pdf->setCellPaddings(0, 0, 0, 0);
        $pdf->SetFont('aealarabiya', ' ', 20);
        $pdf->MultiCell(75, 5, $txt1, 0, 'R', 1, 0, 10, 10, true);

        $txt1 = <<<EOD
الأمن الوطني
EOD;
        $pdf->SetFont('aealarabiya', ' ', 13);
        $pdf->MultiCell(65, 5, $txt1, 0, 'R', 1, 0, 15, 20, true);

        $pdf->SetXY(85, 0);
        $pdf->Image('images/logo_police.png', '', '', 30, 30, '', '', 'T', false, 200, '', false, false, 0, false, false, false);

// center of ellipse
        $xc = 100;
        $yc = 40;

// X Y axis
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Line($xc - 95, $yc, $xc + 95, $yc);
    }

    function vol($pdf, $titles) {
        $request = $this->getRequest();
        
        $pdf->SetFont('aealarabiya', ' ', 16);
        $pdf->MultiCell(70, 5, strtoupper(" Rapport de vol "), 0, 'L', 1, 0, 65, 45, true);
        $pdf->SetFont('times', 'U', 16);
        $pdf->MultiCell(70, 5, "Victime(s):", 0, 'L', 1, 0, 135, 70, true);
        $pdf->SetFont('aealarabiya', 'U', 16);
        $pdf->MultiCell(70, 5, "الضحية:", 0, 'L', 1, 0, -50, 70, true);
        $pdf->SetFont('times', ' ', 14);
        $pdf->MultiCell(120, 5, "Nom:                                                 " . $request->request->get('nom'), 0, 'L', 1, 0, 85, 80, true);
        $pdf->MultiCell(120, 5, "Prénom:                                           " . $request->request->get('prenom'), 0, 'L', 0, 1, 85, 90, true);
        $pdf->MultiCell(120, 5, "N°CIN/Carte de séjour:                   " . $request->request->get('cin'), 0, 'L', 0, 1, 85, 100, true);
        $pdf->MultiCell(120, 5, "Nationalité                                        " . $request->request->get('nationalite'), 0, 'L', 0, 1, 85, 115, true);
        $pdf->MultiCell(200, 5, "Adresse:     " . $request->request->get('adresse'), 0, 'L', 0, 1, 5, 125, true);
        $pdf->MultiCell(120, 5, "Type d'incident:                                " . $request->request->get('type_incident'), 0, 'L', 0, 1, 85, 135, true);
        $pdf->MultiCell(120, 5, "Y a-t-il eu de la violence lors du vol?          " . $request->request->get('violence'), 0, 'L', 0, 1, 85, 145, true);
        $pdf->MultiCell(120, 5, "Y a-t-il présence d'indices valables sur les lieux de l'incident?" . $request->request->get('indices'), 0, 'L', 0, 1, 85, 160, true);
        if ($request->request->get('immatricul') != "") {
            $pdf->MultiCell(120, 5, "N°d'immatriculation: " . $request->request->get('immatricul'), 0, 'L', 0, 1, 85, 180, true);
            $pdf->MultiCell(120, 5, "Autre:                   " . $request->request->get('autre'), 0, 'L', 0, 1, 85, 190, true);
        }
        else
            $pdf->MultiCell(120, 5, "Autre:                   " . $request->request->get('autre'), 0, 'L', 0, 1, 85, 180, true);

        $pdf->SetFont('times', 'U', 16);
        $pdf->MultiCell(70, 5, "Agent(s):", 0, 'L', 0, 1, 135, 200, true);

        $pdf->SetFont('times', '', 14);
        $pdf->MultiCell(200, 5, "Nom:                                                " . $request->request->get('nom_agent'), 0, 'L', 1, 0, 5, 210, true);
        $pdf->MultiCell(200, 5, "Prénom:                                            " . $request->request->get('prenom_agent'), 0, 'L', 0, 1, 5, 220, true);
        $pdf->MultiCell(200, 5, "Grade:                                               " . $request->request->get('grade'), 0, 'L', 0, 1, 5, 230, true);
        $pdf->MultiCell(200, 5, "Service:                                             " . $request->request->get('service'), 0, 'L', 0, 1, 5, 240, true);

//arabe
        $pdf->SetFont('aealarabiya', ' ', 10);
        $pdf->MultiCell(70, 5, $titles['ar_nom'], 0, 'R', 1, 0, 5, 80, true);
        $pdf->MultiCell(70, 5, $titles['ar_prenom'], 0, 'R', 0, 1, 5, 90, true);
        $pdf->MultiCell(70, 5, $titles['ar_cin'], 0, 'R', 0, 1, 5, 100, true);
        $pdf->MultiCell(70, 5, $titles['ar_nationalite'], 0, 'R', 0, 1, 5, 115, true);
        $pdf->MultiCell(70, 5, $titles['ar_adresse'], 0, 'R', 0, 1, 5, 125, true);
        $pdf->MultiCell(70, 5, $titles['ar_type'], 0, 'R', 0, 1, 5, 135, true);
        $pdf->MultiCell(70, 5, $titles['ar_violence'], 0, 'R', 0, 1, 5, 145, true);
        $pdf->MultiCell(70, 5, $titles['ar_indices'], 0, 'R', 0, 1, 5, 160, true);
        if ($request->request->get('immatricul') != "") {
            $pdf->MultiCell(70, 5, "رقم لوحة التسجيل " . $request->request->get('immatricul'), 0, 'R', 0, 1, 5, 180, true);
            $pdf->MultiCell(70, 5, $titles['ar_autre'], 0, 'R', 0, 1, 5, 190, true);
        }
        else
            $pdf->MultiCell(70, 5, $titles['ar_autre'], 0, 'R', 0, 1, 5, 180, true);

        $pdf->SetFont('aealarabiya', 'U', 16);
        $pdf->MultiCell(70, 5, "العنصر ", 0, 'R', 0, 1, 5, 200, true);

        $pdf->SetFont('aealarabiya', '', 10);
        $pdf->MultiCell(70, 5, $titles['ar_nom_agent'], 0, 'R', 1, 0, 5, 210, true);
        $pdf->MultiCell(70, 5, $titles['ar_prenom_agent'], 0, 'R', 0, 1, 5, 220, true);
        $pdf->MultiCell(70, 5, $titles['ar_grade'], 0, 'R', 0, 1, 5, 230, true);
        $pdf->MultiCell(70, 5, $titles['ar_service'], 0, 'R', 0, 1, 5, 240, true);
    }

    function infraction($pdf, $titles) {
        $request = $this->getRequest();
        
        $pdf->SetFont('aealarabiya', ' ', 16);
        $pdf->MultiCell(105, 5, strtoupper(" Rapport d'infraction routiere"), 0, 'L', 1, 0, 65, 45, true);
        $pdf->SetFont('times', 'U', 16);
        $pdf->MultiCell(70, 5, "Transgresseur:", 0, 'L', 1, 0, 135, 70, true);
        $pdf->SetFont('aealarabiya', 'U', 16);
        $pdf->MultiCell(70, 5, "المخالف:", 0, 'L', 1, 0, -50, 70, true);
        $pdf->SetFont('times', ' ', 14);
        $pdf->MultiCell(120, 5, "Nom:                                                 " . $request->request->get('nom'), 0, 'L', 1, 0, 85, 80, true);
        $pdf->MultiCell(120, 5, "Prénom:                                           " . $request->request->get('prenom'), 0, 'L', 0, 1, 85, 90, true);
        $pdf->MultiCell(120, 5, "N°CIN/Carte de séjour:                   " . $request->request->get('cin'), 0, 'L', 0, 1, 85, 100, true);
        $pdf->MultiCell(120, 5, "N° Permis de conduire                    " . $request->request->get('num_permis'), 0, 'L', 0, 1, 85, 110, true);
        $pdf->MultiCell(120, 5, "Catégorie                                          " . $request->request->get('cat_permis'), 0, 'L', 0, 1, 85, 120, true);
        $pdf->MultiCell(120, 5, "Nationalité                                        " . $request->request->get('nationalite'), 0, 'L', 0, 1, 85, 130, true);
        $pdf->MultiCell(200, 5, "Adresse:     " . $request->request->get('adresse'), 0, 'L', 0, 1, 5, 140, true);
        $pdf->MultiCell(120, 5, "N°d'immatriculation                         " . $request->request->get('immatricul'), 0, 'L', 0, 1, 85, 150, true);
        $pdf->MultiCell(120, 5, "Type d'infraction:                " . $request->request->get('type_infraction'), 0, 'L', 0, 1, 85, 160, true);
        $pdf->MultiCell(120, 5, "Lieu d'infraction:                " . $request->request->get('lieu_infraction'), 0, 'L', 0, 1, 85, 170, true);
        $pdf->MultiCell(120, 5, "Autre:                   " . $request->request->get('autre'), 0, 'L', 0, 1, 85, 180, true);

        $pdf->SetFont('times', 'U', 16);
        $pdf->MultiCell(70, 5, "Agent(s):", 0, 'L', 0, 1, 135, 200, true);

        $pdf->SetFont('times', '', 14);
        $pdf->MultiCell(200, 5, "Nom:                                                " . $request->request->get('nom_agent'), 0, 'L', 1, 0, 5, 210, true);
        $pdf->MultiCell(200, 5, "Prénom:                                            " . $request->request->get('prenom_agent'), 0, 'L', 0, 1, 5, 220, true);
        $pdf->MultiCell(200, 5, "Grade:                                               " . $request->request->get('grade'), 0, 'L', 0, 1, 5, 230, true);
        $pdf->MultiCell(200, 5, "Service:                                             " . $request->request->get('service'), 0, 'L', 0, 1, 5, 240, true);

//arabe
        $pdf->SetFont('aealarabiya', ' ', 10);
        $pdf->MultiCell(70, 5, $titles['ar_nom'], 0, 'R', 1, 0, 5, 80, true);
        $pdf->MultiCell(70, 5, $titles['ar_prenom'], 0, 'R', 0, 1, 5, 90, true);
        $pdf->MultiCell(70, 5, $titles['ar_cin'], 0, 'R', 0, 1, 5, 100, true);
        $pdf->MultiCell(70, 5, $titles['ar_num_permis'], 0, 'R', 0, 1, 5, 110, true);
        $pdf->MultiCell(70, 5, $titles['ar_cat_permis'], 0, 'R', 0, 1, 5, 120, true);
        $pdf->MultiCell(70, 5, $titles['ar_nationalite'], 0, 'R', 0, 1, 5, 130, true);
        $pdf->MultiCell(70, 5, $titles['ar_adresse'], 0, 'R', 0, 1, 5, 140, true);
        $pdf->MultiCell(70, 5, "رقم لوحة التسجيل " . $request->request->get('immatricul'), 0, 'R', 0, 1, 5, 150, true);
        $pdf->MultiCell(70, 5, $titles['ar_type_infraction'], 0, 'R', 0, 1, 5, 160, true);
        $pdf->MultiCell(70, 5, $titles['ar_lieu_infraction'], 0, 'R', 0, 1, 5, 170, true);
        $pdf->MultiCell(70, 5, $titles['ar_autre'], 0, 'R', 0, 1, 5, 180, true);

        $pdf->SetFont('aealarabiya', 'U', 16);
        $pdf->MultiCell(70, 5, "العنصر ", 0, 'R', 0, 1, 5, 200, true);

        $pdf->SetFont('aealarabiya', '', 10);
        $pdf->MultiCell(70, 5, $titles['ar_nom_agent'], 0, 'R', 1, 0, 5, 210, true);
        $pdf->MultiCell(70, 5, $titles['ar_prenom_agent'], 0, 'R', 0, 1, 5, 220, true);
        $pdf->MultiCell(70, 5, $titles['ar_grade'], 0, 'R', 0, 1, 5, 230, true);
        $pdf->MultiCell(70, 5, $titles['ar_service'], 0, 'R', 0, 1, 5, 240, true);
    }

    function incendie($pdf, $titles) {
        $request = $this->getRequest();
        
        $pdf->SetFont('aealarabiya', ' ', 16);
        $pdf->MultiCell(70, 5, strtoupper(" Rapport d'incendie"), 0, 'L', 1, 0, 65, 45, true);
        $pdf->SetFont('times', 'U', 16);
        $pdf->MultiCell(70, 5, "L'incendie:", 0, 'L', 1, 0, 135, 70, true);
        $pdf->SetFont('aealarabiya', 'U', 16);
        $pdf->MultiCell(70, 5, "الحريق:", 0, 'L', 1, 0, -50, 70, true);
        $pdf->SetFont('times', ' ', 14);
        $pdf->MultiCell(120, 5, "Type d'incendie:                                                " . $request->request->get('type_incendie'), 0, 'L', 1, 0, 85, 80, true);
        $pdf->MultiCell(120, 5, "Lieu d'incendie:                " . $request->request->get('lieu_incendie'), 0, 'L', 0, 1, 85, 90, true);
        $pdf->MultiCell(120, 5, "Victime :                            " . $request->request->get('nom') . " " . $request->request->get('prenom'), 0, 'L', 0, 1, 85, 100, true);
        $pdf->MultiCell(120, 5, "N°CIN/Carte de séjour:                   " . $request->request->get('cin'), 0, 'L', 0, 1, 85, 110, true);
        $pdf->MultiCell(200, 5, "Adresse:     " . $request->request->get('adresse'), 0, 'L', 0, 1, 5, 120, true);
        $pdf->MultiCell(120, 5, "Cause d'incendie:                " . $request->request->get('cause_incendie'), 0, 'L', 0, 1, 85, 132, true);
        $pdf->MultiCell(200, 5, "Y a-t-il présence d'indices valables sur les lieux de l'incident? " . $request->request->get('indices'), 0, 'L', 0, 1, 5, 145, true);
        $pdf->MultiCell(200, 5, "Y a-t-il des dégats humains?        " . $request->request->get('degat_humain'), 0, 'L', 0, 1, 5, 165, true);
        $pdf->MultiCell(120, 5, "Autre:                   " . $request->request->get('autre'), 0, 'L', 0, 1, 85, 175, true);

        $pdf->SetFont('times', 'U', 16);
        $pdf->MultiCell(70, 5, "Agent(s):", 0, 'L', 0, 1, 135, 200, true);

        $pdf->SetFont('times', '', 14);
        $pdf->MultiCell(200, 5, "Nom:                                                " . $request->request->get('nom_agent'), 0, 'L', 1, 0, 5, 210, true);
        $pdf->MultiCell(200, 5, "Prénom:                                            " . $request->request->get('prenom_agent'), 0, 'L', 0, 1, 5, 220, true);
        $pdf->MultiCell(200, 5, "Grade:                                               " . $request->request->get('grade'), 0, 'L', 0, 1, 5, 230, true);
        $pdf->MultiCell(200, 5, "Service:                                             " . $request->request->get('service'), 0, 'L', 0, 1, 5, 240, true);

//arabe
        $pdf->SetFont('aealarabiya', ' ', 10);
        $pdf->MultiCell(70, 5, $titles['ar_type_incendie'], 0, 'R', 1, 0, 5, 80, true);
        $pdf->MultiCell(70, 5, $titles['ar_lieu_incendie'], 0, 'R', 0, 1, 5, 90, true);
        $pdf->MultiCell(70, 5, "الضحية", 0, 'R', 0, 1, 5, 100, true);
        $pdf->MultiCell(70, 5, $titles['ar_cin'], 0, 'R', 0, 1, 5, 110, true);
        $pdf->MultiCell(70, 5, $titles['ar_adresse'], 0, 'R', 0, 1, 5, 120, true);
        $pdf->MultiCell(70, 5, $titles['ar_cause_incendie'], 0, 'R', 0, 1, 5, 132, true);
        $pdf->MultiCell(70, 5, $titles['ar_indices'], 0, 'R', 0, 1, 5, 145, true);
        $pdf->MultiCell(70, 5, $titles['ar_degat_humain'], 0, 'R', 0, 1, 5, 165, true);
        $pdf->MultiCell(70, 5, $titles['ar_autre'], 0, 'R', 0, 1, 5, 175, true);

        $pdf->SetFont('aealarabiya', 'U', 16);
        $pdf->MultiCell(70, 5, "العنصر ", 0, 'R', 0, 1, 5, 200, true);

        $pdf->SetFont('aealarabiya', '', 10);
        $pdf->MultiCell(70, 5, $titles['ar_nom_agent'], 0, 'R', 1, 0, 5, 210, true);
        $pdf->MultiCell(70, 5, $titles['ar_prenom_agent'], 0, 'R', 0, 1, 5, 220, true);
        $pdf->MultiCell(70, 5, $titles['ar_grade'], 0, 'R', 0, 1, 5, 230, true);
        $pdf->MultiCell(70, 5, $titles['ar_service'], 0, 'R', 0, 1, 5, 240, true);
    }

    function accident($pdf, $titles) {
        $request = $this->getRequest();
        
        $x = 0;
        $pdf->SetFont('aealarabiya', ' ', 16);
        $pdf->MultiCell(70, 5, strtoupper(" Rapport d'accident"), 0, 'L', 1, 0, 65, 45, true);
        $pdf->SetFont('times', 'U', 16);
        $pdf->MultiCell(70, 5, "Partie A :", 0, 'L', 1, 0, 135, 70, true);
        $pdf->SetFont('aealarabiya', 'U', 16);
        $pdf->MultiCell(70, 5, "الطرف أ :", 0, 'L', 1, 0, -50, 70, true);
        $pdf->SetFont('times', ' ', 14);
        $pdf->MultiCell(120, 5, "Nom:                                    " . $request->request->get('nom_a'), 0, 'L', 1, 0, 85, 80, true);
        $pdf->MultiCell(120, 5, "Prénom:                               " . $request->request->get('prenom_a'), 0, 'L', 0, 1, 85, 90, true);
        $pdf->MultiCell(120, 5, "N°CIN/Carte de séjour:                   " . $request->request->get('cin_a'), 0, 'L', 0, 1, 85, 100, true);
        $pdf->MultiCell(200, 5, "Adresse:     " . $request->request->get('adresse_a'), 0, 'L', 0, 1, 5, 110, true);
//arabe
        $pdf->SetFont('aealarabiya', ' ', 10);
        $pdf->MultiCell(70, 5, $titles['ar_nom'], 0, 'R', 1, 0, 5, 80, true);
        $pdf->MultiCell(70, 5, $titles['ar_prenom'], 0, 'R', 0, 1, 5, 90, true);
        $pdf->MultiCell(70, 5, $titles['ar_cin'], 0, 'R', 0, 1, 5, 100, true);
        $pdf->MultiCell(70, 5, $titles['ar_adresse'], 0, 'R', 0, 1, 5, 110, true);
        $pdf->SetFont('times', ' ', 14);
        if ($request->request->get('type_accidente_a') == "conducteur") {
            $pdf->MultiCell(200, 5, "N°Permis de conduire:     " . $request->request->get('type'), 0, 'L', 0, 1, 5, 120, true);
            $pdf->MultiCell(200, 5, "Catégorie du permis de conduire:     " . $request->request->get('cat_permis_a'), 0, 'L', 0, 1, 5, 130, true);
            $pdf->MultiCell(200, 5, "N°d'immatriculation:     " . $request->request->get('immatricul_a'), 0, 'L', 0, 1, 5, 140, true);
            $pdf->MultiCell(200, 5, "Status:        " . $request->request->get('status_a'), 0, 'L', 0, 1, 5, 150, true);
            //arabe
            $pdf->SetFont('aealarabiya', ' ', 10);
            $pdf->MultiCell(70, 5, $titles['ar_num_permis'], 0, 'R', 1, 0, 5, 120, true);
            $pdf->MultiCell(70, 5, $titles['ar_cat_permis'], 0, 'R', 0, 1, 5, 130, true);
            $pdf->MultiCell(70, 5, $titles['ar_immatricul'], 0, 'R', 0, 1, 5, 140, true);
            $pdf->MultiCell(70, 5, $titles['ar_status'], 0, 'R', 0, 1, 5, 150, true);
            $x = 150;
        }
        if ($request->request->get('type_accidente_a') == "pieton") {
            $pdf->MultiCell(200, 5, "Status:        " . $request->request->get('status_a'), 0, 'L', 0, 1, 5, 120, true);
            //arabe
            $pdf->SetFont('aealarabiya', ' ', 10);
            $pdf->MultiCell(70, 5, $titles['ar_status'], 0, 'R', 0, 1, 5, 120, true);
            $x = 120;
        }

        $pdf->SetFont('times', 'U', 16);
        $pdf->MultiCell(70, 5, "Partie B :", 0, 'L', 1, 0, 135, $x + 10, true);
        $pdf->SetFont('aealarabiya', 'U', 16);
        $pdf->MultiCell(70, 5, "الطرف ب :", 0, 'L', 1, 0, -50, $x + 10, true);
        $pdf->SetFont('times', ' ', 14);
        $pdf->MultiCell(120, 5, "Nom:                                    " . $request->request->get('nom_b'), 0, 'L', 1, 0, 85, $x + 20, true);
        $pdf->MultiCell(120, 5, "Prénom:                               " . $request->request->get('prenom_b'), 0, 'L', 0, 1, 85, $x + 30, true);
        $pdf->MultiCell(120, 5, "N°CIN/Carte de séjour:                   " . $request->request->get('cin_b'), 0, 'L', 0, 1, 85, $x + 40, true);
        $pdf->MultiCell(200, 5, "Adresse:     " . $request->request->get('adresse_b'), 0, 'L', 0, 1, 5, $x + 50, true);
//arabe
        $pdf->SetFont('aealarabiya', ' ', 10);
        $pdf->MultiCell(70, 5, $titles['ar_nom'], 0, 'R', 1, 0, 5, $x + 20, true);
        $pdf->MultiCell(70, 5, $titles['ar_prenom'], 0, 'R', 0, 1, 5, $x + 30, true);
        $pdf->MultiCell(70, 5, $titles['ar_cin'], 0, 'R', 0, 1, 5, $x + 40, true);
        $pdf->MultiCell(70, 5, $titles['ar_adresse'], 0, 'R', 0, 1, 5, $x + 50, true);
        $pdf->SetFont('times', ' ', 14);
        if ($request->request->get('type_accidente_b') == "conducteur") {

            $pdf->MultiCell(200, 5, "N°Permis de conduire:     " . $request->request->get('num_permis_b'), 0, 'L', 0, 1, 5, $x + 60, true);
            $pdf->MultiCell(200, 5, "Catégorie du permis de conduire:     " . $request->request->get('cat_permis_b'), 0, 'L', 0, 1, 5, $x + 70, true);
            $pdf->MultiCell(200, 5, "N°d'immatriculation:     " . $request->request->get('immatricul_b'), 0, 'L', 0, 1, 5, $x + 80, true);
            $pdf->MultiCell(200, 5, "Status:        " . $request->request->get('status_b'), 0, 'L', 0, 1, 5, $x + 90, true);
            $pdf->MultiCell(120, 5, "Autre:        " . $request->request->get('autre_b'), 0, 'L', 0, 1, 85, $x + 100, true);
            //arabe
            $pdf->SetFont('aealarabiya', ' ', 10);
            $pdf->MultiCell(70, 5, $titles['ar_num_permis'], 0, 'R', 1, 0, 5, $x + 60, true);
            $pdf->MultiCell(70, 5, $titles['ar_cat_permis'], 0, 'R', 0, 1, 5, $x + 70, true);
            $pdf->MultiCell(70, 5, $titles['ar_immatricul'], 0, 'R', 0, 1, 5, $x + 80, true);
            $pdf->MultiCell(70, 5, $titles['ar_status'], 0, 'R', 0, 1, 5, $x + 90, true);
            $pdf->MultiCell(70, 5, $titles['ar_autre'], 0, 'R', 0, 1, 5, $x + 100, true);
            $x = $x + 100;
        }
        if ($request->request->get('type_accidente_b') == "pieton") {
            $pdf->MultiCell(200, 5, "Status:        " . $request->request->get('status_b'), 0, 'L', 0, 1, 5, $x + 60, true);
            $pdf->MultiCell(120, 5, "Autre:        " . $request->request->get('autre_b'), 0, 'L', 0, 1, 85, $x + 70, true);
            //arabe
            $pdf->SetFont('aealarabiya', ' ', 10);
            $pdf->MultiCell(70, 5, $titles['ar_status'], 0, 'R', 0, 1, 5, $x + 60, true);
            $pdf->MultiCell(70, 5, $titles['ar_autre'], 0, 'R', 0, 1, 5, $x + 70, true);
            $x = $x + 70;
        }


        if ($x == 220 or $x > 220) {

            $pdf->AddPage();
            init_header($pdf);
            $pdf->SetFont('times', 'U', 16);
            $pdf->MultiCell(70, 5, "Agent(s):", 0, 'L', 0, 1, 135, 70, true);

            $pdf->SetFont('times', '', 14);
            $pdf->MultiCell(200, 5, "Nom:                                                " . $request->request->get('nom_agent'), 0, 'L', 1, 0, 5, 80, true);
            $pdf->MultiCell(200, 5, "Prénom:                                                 " . $request->request->get('prenom_agent'), 0, 'L', 0, 1, 5, 90, true);
            $pdf->MultiCell(200, 5, "Grade:                                               " . $request->request->get('grade'), 0, 'L', 0, 1, 5, 100, true);
            $pdf->MultiCell(200, 5, "Service:                                             " . $request->request->get('service'), 0, 'L', 0, 1, 5, 110, true);

            //arabe
            $pdf->SetFont('aealarabiya', 'U', 16);
            $pdf->MultiCell(70, 5, "العنصر ", 0, 'R', 0, 1, 5, 70, true);

            $pdf->SetFont('aealarabiya', '', 10);
            $pdf->MultiCell(70, 5, $titles['ar_nom_agent'], 0, 'R', 1, 0, 5, 80, true);
            $pdf->MultiCell(70, 5, $titles['ar_prenom_agent'], 0, 'R', 0, 1, 5, 90, true);
            $pdf->MultiCell(70, 5, $titles['ar_grade'], 0, 'R', 0, 1, 5, 100, true);
            $pdf->MultiCell(70, 5, $titles['ar_service'], 0, 'R', 0, 1, 5, 110, true);
        } else {
            $pdf->SetFont('times', 'U', 16);
            $pdf->MultiCell(70, 5, "Agent(s):", 0, 'L', 0, 1, 135, $x + 10, true);

            $pdf->SetFont('times', '', 14);
            $pdf->MultiCell(200, 5, "Nom:                                                " . $request->request->get('nom_agent'), 0, 'L', 1, 0, 5, $x + 20, true);
            $pdf->MultiCell(200, 5, "Prénom:                                            " . $request->request->get('prenom_agent'), 0, 'L', 0, 1, 5, $x + 30, true);
            $pdf->MultiCell(200, 5, "Grade:                                               " . $request->request->get('grade'), 0, 'L', 0, 1, 5, $x + 40, true);
            $pdf->MultiCell(200, 5, "Service:                                             " . $request->request->get('service'), 0, 'L', 0, 1, 5, $x + 50, true);

            //arabe
            $pdf->SetFont('aealarabiya', 'U', 16);
            $pdf->MultiCell(70, 5, "العنصر ", 0, 'R', 0, 1, 5, $x + 10, true);

            $pdf->SetFont('aealarabiya', '', 10);
            $pdf->MultiCell(70, 5, $titles['ar_nom_agent'], 0, 'R', 1, 0, 5, $x + 20, true);
            $pdf->MultiCell(70, 5, $titles['ar_prenom_agent'], 0, 'R', 0, 1, 5, $x + 30, true);
            $pdf->MultiCell(70, 5, $titles['ar_grade'], 0, 'R', 0, 1, 5, $x + 40, true);
            $pdf->MultiCell(70, 5, $titles['ar_service'], 0, 'R', 0, 1, 5, $x + 50, true);
        }




        //pdf->AddPage();
    }

    public function createRapportAction() {
        $request = $this->getRequest();
        require_once(__DIR__.'/../../../../web/najdah/tcpdf/tcpdf_include.php');

// create new PDF document
        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 002');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

// set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        $lg = Array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';

// set some language-dependent strings (optional)
        $pdf->setLanguageArray($lg);


// set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

// ---------------------------------------------------------
// set cell padding
        $pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
        $pdf->setCellMargins(1, 1, 1, 1);

// set color for background
        $pdf->SetFillColor(169, 205, 104);

// set font
        $pdf->SetFont('dejavusans', '', 13);

// add a page
        $pdf->AddPage();
        $pdf->SetFont('aealarabiya', 'Bl', 14);

        $this->init_header($pdf);

// hna 
        //$json = file_get_contents(__DIR__."/../../../../web/najdah/json_rapport/declaration.json");
//var_dump(json_decode($json));

        //$parsed_json = json_decode($json);
        //$request->request->get('type')
        $txt1 = $request->request->get('type');

        $date = date('d') . '-' . date('m') . '-' . date('Y');
        $province = "Marrakech";

        $pdf->SetFont('times', ' ', 14);
        $pdf->MultiCell(70, 5, '  DATE:    ' . $date, 1, 'L', 1, 1, 100, 55, true);
        $pdf->MultiCell(70, 5, '  PROVINCE:  ' . $province, 1, 'L', 0, 1, 30, 55, true);

        $ar_nom = "الإسم العائلي";
        $ar_prenom = "الإسم الشخصي";
        $ar_cin = "رقم ب.ت.و/جواز السفر أو ب.إ";
        $ar_nationalite = "الجنسية";
        $ar_adresse = "العنوان";
        $ar_type = "نوعية الحدث";
        $ar_violence = "هل كان هناك عنف أثناء العملية؟";
        $ar_indices = "هناك ادلة في مكان الحادث؟";
        $ar_immatricul = "رقم لوحة التسجيل";
        $ar_autre = "آخر";
        $ar_num_permis = "رقم رخصة السياقة";
        $ar_cat_permis = "صنف رخصة السياقة";
        $ar_type_infraction = "المخالفة";
        $ar_lieu_infraction = "مكان المخالفة";
        $ar_type_incendie = "نوعية الحريق";
        $ar_lieu_incendie = "مكان الحريق";
        $ar_degat_humain = "خسائر في الأرواح";
        $ar_cause_incendie = "سبب الحريق";
        $ar_status = "الوضعية";

        $ar_nom_agent = "الإسم العائلي";
        $ar_prenom_agent = "الإسم الشخصي";
        $ar_grade = "الرتبة";
        $ar_service = "قسم";

        $arabic_titles = array('ar_nom' => $ar_nom, 'ar_prenom' => $ar_prenom, 'ar_cin' => $ar_cin, 'ar_nationalite' => $ar_nationalite,
            'ar_adresse' => $ar_adresse, 'ar_type' => $ar_type, 'ar_violence' => $ar_violence, 'ar_indices' => $ar_indices,
            'ar_immatricul' => $ar_immatricul, 'ar_autre' => $ar_autre,
            'ar_nom_agent' => $ar_nom_agent, 'ar_prenom_agent' => $ar_prenom_agent, 'ar_grade' => $ar_grade, 'ar_service' => $ar_service,
            'ar_num_permis' => $ar_num_permis, 'ar_cat_permis' => $ar_cat_permis, 'ar_type_infraction' => $ar_type_infraction,
            'ar_lieu_infraction' => $ar_lieu_infraction, 'ar_type_incendie' => $ar_type_incendie,
            'ar_lieu_incendie' => $ar_lieu_incendie, 'ar_degat_humain' => $ar_degat_humain,
            'ar_cause_incendie' => $ar_cause_incendie, 'ar_status' => $ar_status);


        if ($txt1 == "Vol")
            $this->vol($pdf, $arabic_titles);
        if ($txt1 == "Infraction routiere")
            $this->infraction($pdf, $arabic_titles);

        if ($txt1 == "Incendie")
            $this->incendie($pdf, $arabic_titles);

        if ($txt1 == "Accident")
            $this->accident($pdf, $arabic_titles);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

        $pdf->SetFont('aealarabiya', '', 13);

// ---------------------------------------------------------
        //$id_declaration=$parsed_json->{'id_declaration'};
        $id_declaration=$request->request->get('id_declaration');
        //$id_declaration=11;
//Close and output PDF document
        $time = date("H") . '-' . date("i") . '-' . date('s');
        $name = "Rapport_" . $id_declaration . "_" . $date . '_' . $time;
        
        $em = $this->getDoctrine()->getManager();
        
        $declaration = $em->getRepository('NajdahAppBundle:Declaration')->find($id_declaration);
        $declaration->setLienRapport($name);

        $em->persist($declaration);
        $em->flush();
        
        $pdf->Output(__DIR__."/../../../../web/najdah/pdf_rapport/".$name . '.pdf', 'FI');

//============================================================+
// END OF FILE
//============================================================+
        $response = new Response(json_encode(array(array('Statut' => 'Ok'))));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    
    public function getEtablissementAction(){
        $tabEtabs=array();
        $em = $this->getDoctrine()->getManager();
        $etablissements = $em->getRepository('NajdahEtabBundle:Etablissement')->findAll();
        foreach ($etablissements as $etab) {
            $tab=array();
            $tab['id']=$etab->getId();
            $tab['designation']=$etab->getDesignation();
            $tab['x']=$etab->getX();
            $tab['y']=$etab->getY();
            $tab['adresse']=$etab->getAdresse();
            $tab['type']=$etab->getType()->getId();
            $tab['ville']=$etab->getVille()->getLibelle();
            $tabEtabs[]=$tab;
        }
        
        //$response = new Response(json_encode(array(array('id' => '77'))));
        $response = new Response(json_encode($tabEtabs));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function connexionAction(){
        $rep="";
        $request = $this->getRequest();
        
        $em = $this->getDoctrine()->getManager();
        $policier = $em->getRepository('NajdahUserBundle:User')
                ->findOneBy(array('username' => $request->request->get('login')));
        
        if($policier==null)     $rep="Non";
        else                    $rep="Oui";
        
        //$response = new Response(json_encode(array("Statut" => $rep)));
        $response = new Response($rep);
        //$response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}