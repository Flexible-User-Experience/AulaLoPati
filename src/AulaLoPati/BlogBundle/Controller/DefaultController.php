<?php

namespace AulaLoPati\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	public function iniciAction(){
		
		return $this->redirect($this->generateUrl('presentacio'));
		
	}
    public function presentacioAction()
    {
        return $this->render('BlogBundle:Default:presentacio.html.twig');
    }
    
	public function projectesAction(){
		
		return $this->render('BlogBundle:Default:projectes.html.twig');
		
	}
	public function arxiuAction(){
	
		return $this->render('BlogBundle:Default:arxiu.html.twig');
	
	}
	public function publicacionsAction(){
	
		return $this->render('BlogBundle:Default:publicacions.html.twig');
	
	}
	
	public function llistaJornadesAction(){
		$em = $this->getDoctrine()->getEntityManager();
		$jornades= $em->getRepository('BlogBundle:Jornada')->findJornades();
		
		return $this->render('BlogBundle:Default:llistaJornades.html.twig', array('jornades'=>$jornades));
	
	}
	public function jornadaAction($titol){
		$em = $this->getDoctrine()->getEntityManager();
		$jornada = $em->getRepository('BlogBundle:Jornada')->findOneBy(array('slug'=>$titol));
		return $this->render('BlogBundle:Default:jornada.html.twig',array('jornada'=>$jornada));
	
	}
	public function enllasosAction(){
	
		return $this->render('BlogBundle:Default:enllasos.html.twig');
	
	}
	
	public function contacteAction(){
	
		return $this->render('BlogBundle:Default:contacte.html.twig');
	
	}
}
