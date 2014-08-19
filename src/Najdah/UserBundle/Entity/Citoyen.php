<?php

namespace Najdah\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Citoyen
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Najdah\UserBundle\Repository\CitoyenRepository")
 */
class Citoyen
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
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=15)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=20)
     */
    private $tel;
    /**
     * @ORM\ManyToOne(targetEntity="Najdah\AppBundle\Entity\Ville")
     * @ORM\JoinColumn(nullable=true)
     */
    private $ville;
    /**
     * @ORM\ManyToOne(targetEntity="Najdah\AppBundle\Entity\Nationalite")
     * @ORM\JoinColumn(nullable=true)
     */
    private $nationalite;


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
     * Set nom
     *
     * @param string $nom
     * @return Citoyen
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
     * Set prenom
     *
     * @param string $prenom
     * @return Citoyen
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set cin
     *
     * @param string $cin
     * @return Citoyen
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return string 
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Citoyen
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
     * Set ville
     *
     * @param \Najdah\AppBundle\Entity\Ville $ville
     * @return Citoyen
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

    /**
     * Set nationalite
     *
     * @param \Najdah\AppBundle\Entity\Nationalite $nationalite
     * @return Citoyen
     */
    public function setNationalite(\Najdah\AppBundle\Entity\Nationalite $nationalite = null)
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * Get nationalite
     *
     * @return \Najdah\AppBundle\Entity\Nationalite 
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }
}
