<?php
namespace AulaLoPati\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EnllasRepository extends EntityRepository
{
	public function findEnllasos(){
		
		$em = $this->getEntityManager();
		
		$consulta = $em->createQuery('SELECT e FROM BlogBundle:Enllas e WHERE
		e.actiu = TRUE ORDER BY e.ordre DESC');
		
		return $consulta->getResult();
	}
	
	

	
}