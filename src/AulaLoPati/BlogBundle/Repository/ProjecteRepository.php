<?php
namespace AulaLoPati\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProjecteRepository extends EntityRepository
{
	public function findProjectes(){
		
		$em = $this->getEntityManager();
		
		$consulta = $em->createQuery('SELECT p FROM BlogBundle:Projecte p WHERE
		p.actiu = TRUE ORDER BY p.data_publicacio DESC');
		
		return $consulta->getResult();
	}
	
	

	
}