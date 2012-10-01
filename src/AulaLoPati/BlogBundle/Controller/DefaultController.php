<?php

namespace AulaLoPati\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function presentacioAction()
    {
        return $this->render('BlogBundle:Default:presentacio.html.twig');
    }
}
