<?php

namespace AulaLoPati\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AulaLoPati\BlogBundle\Form\ContactType;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

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
		$ponencies= $em->getRepository('BlogBundle:Ponencia')->findPonencies($titol);
		
		return $this->render('BlogBundle:Default:jornada.html.twig',array('jornada'=>$jornada,
				'ponencies'=>$ponencies));
	
	}
	public function enllasosAction(){
	
		return $this->render('BlogBundle:Default:enllasos.html.twig');
	
	}
	
	public function contacteAction(Request $request){
		
		$form = $this->createForm(new ContactType());
		
		if ($request->getMethod() == 'POST') {
			$form->bindRequest($request);
		
			if ($form->isValid()) {
				$data = $form->getData();

				$message = \Swift_Message::newInstance()
				->setSubject($data['topic'])
				->setFrom(array($data['email'] => $data['name']))
				->setTo($this->container->getParameter('aulalopati.mail'))
				->setBody($data['message'])
				;
				$this->get('mailer')->send($message);
				$this->get('session')->setFlash('notice', 'Gràcies per contactar amb nosaltres, ens posarem amb contacte el més aviat possible.');
				return $this->redirect($this->generateUrl('contacte'));
			}
		}

		return $this->render('BlogBundle:Default:contacte.html.twig',array('form' => $form->createView()));
	
	}
}
