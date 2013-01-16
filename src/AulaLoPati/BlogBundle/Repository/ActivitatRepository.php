<?php
namespace AulaLoPati\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ActivitatRepository extends EntityRepository
{

	
	public function findActivitats($slug){
	
		$em = $this->getEntityManager();
	
		$consulta = $em->createQuery('SELECT a FROM BlogBundle:Activitat a LEFT JOIN a.projecte p WHERE
				a.actiu = TRUE AND p.slug = :sl ORDER BY a.data_publicacio DESC');
		$consulta->setParameter('sl',$slug);
		return $consulta->getResult();
	}
	
}