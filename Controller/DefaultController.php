<?php

namespace Codebender\LogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CodebenderLogBundle:Default:index.html.twig', array('name' => $name));
    }
}
