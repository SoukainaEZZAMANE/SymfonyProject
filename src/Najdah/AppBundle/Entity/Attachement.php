<?php

namespace Najdah\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attachement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Najdah\AppBundle\Repository\AttachementRepository")
 */
class Attachement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=255, nullable=true)
     */
    private $lien;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=100, nullable=true)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;


    /**
    * @ORM\ManyToOne(targetEntity="Najdah\AppBundle\Entity\Declaration",inversedBy="attachements")
     * @ORM\JoinColumn(nullable=true)
    */
    private $declaration;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lien
     *
     * @param string $lien
     * @return Attachement
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string 
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Attachement
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Attachement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set declaration
     *
     * @param \Najdah\AppBundle\Entity\Declaration $declaration
     * @return Attachement
     */
    public function setDeclaration(\Najdah\AppBundle\Entity\Declaration $declaration = null)
    {
        $this->declaration = $declaration;

        return $this;
    }

    /**
     * Get declaration
     *
     * @return \Najdah\AppBundle\Entity\Declaration 
     */
    public function getDeclaration()
    {
        return $this->declaration;
    }
    
    public function getUploadDir()
    {
        // On retourne le chemin relatif vers l'image pour un navigateur
        return 'najdah/img/attachement';
    }
    
    protected function getUploadRootDir()
    {
        // On retourne le chemin relatif vers l'image pour notre code PHP
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
	
    public function getWebPath()
    {
        return $this->getUploadDir().'/'.$this->getLien().'.jpg';
    }
}
