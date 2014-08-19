<?php
// src/Najdah/UserBundle/Entity/User.php

namespace Najdah\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Najdah\UserBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=50, nullable=true)
     */
    private $matricule;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=20, nullable=true)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=1, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="lastX", type="string", length=150, nullable=true)
     */
    private $lastX;

    /**
     * @var string
     *
     * @ORM\Column(name="lastY", type="string", length=150, nullable=true)
     */
    private $lastY;
    
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=150, nullable=true)
     */
    private $image;

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
     * Set matricule
     *
     * @param string $matricule
     * @return User
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string 
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return User
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
     * Set tel
     *
     * @param string $tel
     * @return User
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return User
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set lastX
     *
     * @param string $lastX
     * @return User
     */
    public function setLastX($lastX)
    {
        $this->lastX = $lastX;

        return $this;
    }

    /**
     * Get lastX
     *
     * @return string 
     */
    public function getLastX()
    {
        return $this->lastX;
    }

    /**
     * Set lastY
     *
     * @param string $lastY
     * @return User
     */
    public function setLastY($lastY)
    {
        $this->lastY = $lastY;

        return $this;
    }

    /**
     * Get lastY
     *
     * @return string 
     */
    public function getLastY()
    {
        return $this->lastY;
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
        return 'najdah/img/users';
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
    
    public function getFile()
    {
        return $this->file;
    }
	
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;
    }

    /**
     * Set ville
     *
     * @param \Najdah\AppBundle\Entity\Ville $ville
     * @return User
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
