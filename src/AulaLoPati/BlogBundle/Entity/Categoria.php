<?php

namespace AulaLoPati\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use AulaLoPati\BlogBundle\Util\Util;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;





/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity("nom")
 */
class Categoria {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */

	protected $id;
	
	/** @ORM\Column(type="string", length=100)
	 */
	protected $nom;
	
	
	
	
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
	 */
	public function setNom($nom)
	{
		$this->nom = $nom;
		 
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
	public function __toString(){
		
		return $this->nom;
		
	}
}