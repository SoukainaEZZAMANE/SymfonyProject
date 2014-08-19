<?php
namespace Najdah\AppBundle\Twig\Extension;
use Symfony\Bridge\Doctrine\RegistryInterface;

class NoticeTwigExtension extends \Twig_Extension
{
	protected $doctrine;

	public function __construct(RegistryInterface $doctrine)
        {
            $this->doctrine = $doctrine;

        }
    // retourner le nombre de notifications non lus 
    public function getNbrNoticeExtension()
        {
            $nbrNotice = $this->doctrine
                ->getRepository('NajdahAppBundle:Declaration')
                ->getNomberNoticeNomber();
                
            return $nbrNotice;
        }
    // retounrer les détails sur les notifications nonn lus
    public function getLastNotice()
        {
            
            $lastNotices = $this->getDoctrine()
            				->getRepository('NajdahAppBundle:Declaration')
            				->getLastNotice();
            return $lastNotices;
        }
    // redéclaration de getName depuis l'interface Twig_extension 
    // Twig_extenstion hérite de Twig_extension Twig_ExtensionInterface qui en cas ou on 
    //l'implémente (Twig_ExtensionInterface) on doit implémenter toutes les fonctions qui sont dans cette
    //interface mais Twig_Extension nous permet d'implementer le minimum des functions c-a-d getName
	public function getName()
		{
			return 'notice';
		}
	//Si notre twig extension contient plusieurs fonctions alors on doit les repérer
	public function getFunctions()
    {
        return array(
            'nbrNotices' => new \Twig_Function_Method($this, 'getNbrNoticeExtension', array('is_safe' => array('html'))),
            'lastNotices' => new \Twig_Function_Method($this,'getLastNotice', array('is_safe' => array('html'))));
    }

}