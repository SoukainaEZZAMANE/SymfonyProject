<?php

namespace Najdah\EtabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Etablissement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Najdah\EtabBundle\Entity\EtablissementRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Etablissement
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
     * @ORM\Column(name="designation", type="string", length=120)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(name="x", type="string", length=100)
     */
    private $x;

    /**
     * @var string
     *
     * @ORM\Column(name="y", type="string", length=100)
     */
    private $y;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=150, nullable=true)
     */
    private $image;

    /**
    * @ORM\ManyToOne(targetEntity="Najdah\EtabBundle\Entity\TypeEtablissement")
    */
    private $type;

    private $file;
    /**
     * @ORM\ManyToOne(targetEntity="Najdah\AppBundle\Entity\Ville")
     * @ORM\JoinColumn(nullable=true)
     */
    private $ville;

    
    
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
     * Set designation
     *
     * @param string $designation
     * @return Etablissement
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string 
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set x
     *
     * @param string $x
     * @return Etablissement
     */
    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    /**
     * Get x
     *
     * @return string 
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set y
     *
     * @param string $y
     * @return Etablissement
     */
    public function setY($y)
    {
        $this->y = $y;

        return $this;
    }

    /**
     * Get y
     *
     * @return string 
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Etablissement
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    

    /**
     * Set type
     *
     * @param \Najdah\EtabBundle\Entity\TypeEtablissement $type
     * @return Etablissement
     */
    public function setType(\Najdah\EtabBundle\Entity\TypeEtablissement $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Najdah\EtabBundle\Entity\TypeEtablissement 
     */
    public function getType()
    {
        return $this->type;
    }
    
    public function getFile()
    {
        return $this->file;
    }
	
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        // Si jamais il n'y a pas de fichier (champ facultatif)
        if (null === $this->file) { return; }
        $this->image = $this->file->guessExtension();
    }
	
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        // Si jamais il n'y a pas de fichier (champ facultatif)
        if (null === $this->file) { return; }

        $this->file->move( $this->getUploadRootDir(), $this->id.'.'.$this->image );
    }
	
    /**
    * @ORM\PreRemove()
    */
    public function preRemoveUpload()
    {
        $tempFile = $this->getUploadRootDir().'/'.$this->id.'.'.$this->image;;
        if (file_exists($tempFile)) {
                unlink($tempFile);
        }
    }

    public function getUploadDir()
    {
        // On retourne le chemin relatif vers l'image pour un navigateur
        return 'najdah/img/Etablissements';
    }
    
    protected function getUploadRootDir()
    {
        // On retourne le chemin relatif vers l'image pour notre code PHP
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
	
    public function getWebPath()
    {
        return $this->getUploadDir().'/'.$this->getId().'.'.$this->getImage();
    }

    /**
     * Set image
     *
     * @param string $image
     * @return User
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set ville
     *
     * @param \Najdah\AppBundle\Entity\Ville $ville
     * @return Etablissement
     */
    public function setVille(\Najdah\AppBundle\Entity\Ville $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \Najdah\AppBundle\Entity\Ville 
     */
    public function getVille()
    {
        return $this->ville;
    }
}
