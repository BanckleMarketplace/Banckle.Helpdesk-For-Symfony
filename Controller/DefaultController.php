<?php

namespace Banckle\Bundle\HelpdeskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BanckleHelpdeskBundle:Default:index.html.twig', array('name' => $name));
    }
}
