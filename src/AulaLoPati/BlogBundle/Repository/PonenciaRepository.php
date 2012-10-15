<?php
namespace AulaLoPati\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PonenciaRepository extends EntityRepository
{

	
	public function findPonencies($slug){
	
		$em = $this->getEntityManager();
	
		$consulta = $em->createQuery('SELECT p FROM BlogBundle:Ponencia p LEFT JOIN p.jornada j WHERE
				p.actiu = TRUE AND j.slug = :sl ORDER BY p.data_publicacio');
		$consulta->setParameter('sl',$slug);
		return $consulta->getResult();
	}
	
}