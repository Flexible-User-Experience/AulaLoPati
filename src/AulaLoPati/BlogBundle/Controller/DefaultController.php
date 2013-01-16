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

        $em = $this->getDoctrine()->getManager();
        //$categories = $em->getRepository('MenuBundle:Categoria')->findAll();
        $query = $em->createQuery('SELECT p FROM BlogBundle:Presentacio p WHERE p.id =1');

        $presentacio = $query->getOneOrNullResult();

        return $this->render('BlogBundle:Default:presentacio.html.twig',array('presentacio' => $presentacio));
    }
    

	public function llistaArxiusAction(){

        $em = $this->getDoctrine()->getManager();
        $arxius= $em->getRepository('BlogBundle:Arxiu')->findArxius();

        return $this->render('BlogBundle:Default:llistaArxius.html.twig', array('arxius'=>$arxius));
	
		//return $this->render('BlogBundle:Default:arxiu.html.twig');
	
	}
    public function arxiuAction($titol){
        $em = $this->getDoctrine()->getManager();
        $arxiu = $em->getRepository('BlogBundle:Arxiu')->findOneBy(array('slug'=>$titol));


        return $this->render('BlogBundle:Default:arxiu.html.twig',array('arxiu'=>$arxiu));

    }
	public function publicacionsAction(){
	
		return $this->render('BlogBundle:Default:publicacions.html.twig');
	
	}
	
	public function llistaJornadesAction(){
        $em = $this->getDoctrine()->getManager();
		$jornades= $em->getRepository('BlogBundle:Jornada')->findJornades();
		
		return $this->render('BlogBundle:Default:llistaJornades.html.twig', array('jornades'=>$jornades));
	
	}
	public function jornadaAction($titol){
        $em = $this->getDoctrine()->getManager();
		$jornada = $em->getRepository('BlogBundle:Jornada')->findOneBy(array('slug'=>$titol));
		$ponencies= $em->getRepository('BlogBundle:Ponencia')->findPonencies($titol);
		
		return $this->render('BlogBundle:Default:jornada.html.twig',array('jornada'=>$jornada,
				'ponencies'=>$ponencies));
	
	}
    public function llistaProjectesAction(){
        $em = $this->getDoctrine()->getManager();
        $projectes= $em->getRepository('BlogBundle:Projecte')->findProjectes();

        return $this->render('BlogBundle:Default:llistaProjectes.html.twig', array('projectes'=>$projectes));

    }
    public function projecteAction($titol){
        $em = $this->getDoctrine()->getManager();
        $projecte = $em->getRepository('BlogBundle:Projecte')->findOneBy(array('slug'=>$titol));
        $activitats= $em->getRepository('BlogBundle:Activitat')->findActivitats($titol);

        return $this->render('BlogBundle:Default:projecte.html.twig',array('projecte'=>$projecte,
            'activitats'=>$activitats));

    }

	public function recursosAction(){

        $em = $this->getDoctrine()->getManager();
		$enllasos= $em->getRepository('BlogBundle:Enllas')->findEnllasos();
		
		return $this->render('BlogBundle:Default:recursos.html.twig', array('enllasos'=>$enllasos));
	
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
	
	public function creditsAction(){

	
		return $this->render('BlogBundle:Default:credits.html.twig');
	
	}
	
}
