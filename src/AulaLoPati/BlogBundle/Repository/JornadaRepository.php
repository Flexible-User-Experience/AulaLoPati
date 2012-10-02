<?php
namespace AulaLoPati\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

class JornadaRepository extends EntityRepository
{
	public function findJornades(){
		
		$em = $this->getEntityManager();
		
		$consulta = $em->createQuery('SELECT j FROM BlogBundle:Jornada j WHERE
		j.actiu = TRUE ORDER BY j.data_publicacio');
		
		return $consulta->getResult();
	}
	
	

	
}