<?php
namespace AulaLoPati\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ArxiuRepository extends EntityRepository
{
	public function findArxius(){
		
		$em = $this->getEntityManager();
		
		$consulta = $em->createQuery('SELECT a FROM BlogBundle:Arxiu a WHERE
		a.actiu = TRUE ORDER BY a.data_publicacio DESC');
		
		return $consulta->getResult();
	}
	
	

	
}